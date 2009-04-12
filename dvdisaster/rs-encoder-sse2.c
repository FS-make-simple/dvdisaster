/*  dvdisaster: Additional error correction for optical media.
 *  Copyright (C) 2004-2009 Carsten Gnoerlich.
 *  Project home page: http://www.dvdisaster.com
 *  Email: carsten@dvdisaster.com  -or-  cgnoerlich@fsfe.org
 *
 *  This program is free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program; if not, write to the Free Software
 *  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA,
 *  or direct your browser at http://www.gnu.org.
 */

#include "dvdisaster.h"

#ifdef HAVE_SSE2
  #include <emmintrin.h>

#ifdef HAVE_CPUID
  #include <cpuid.h>
#else
  #include "compat/cpuid.h"
#endif
#endif

/***
 *** Reed-Solomon encoding using SSE2 intrinsics
 ***/

/* SSE 2 version */

#ifdef HAVE_SSE2 
int ProbeSSE2(void)
{  unsigned int eax, ebx, ecx, edx;

   if(!__get_cpuid(1, &eax, &ebx, &ecx, &edx))
   {  Verbose("[ProbeSSE2: get_cpuid() failed]\n");
      return 0;
   }

   if(edx & bit_SSE2)
   {  Verbose("[ProbeSSE2: SSE2 available]\n");
      return 1;
   }
   else
   {  Verbose("[ProbeSSE2: no SSE2]\n");
      return 0;
   }
}

void encode_next_layer_sse2(ReedSolomonTables *rt, unsigned char *data, unsigned char *parity, guint64 layer_size, int shift)
{  gint32 *gf_index_of  = rt->gfTables->indexOf;
   gint32 *enc_alpha_to = rt->gfTables->encAlphaTo;
   gint32 *rs_gpoly     = rt->gpoly;
   int nroots           = rt->nroots;
   int nroots_aligned   = (nroots+15)&~15;
   int nroots_full      = nroots_aligned>>4;
   int i,j;

   for(i=0; i<layer_size; i++)
   {  int feedback    = gf_index_of[data[i] ^ parity[shift]];
      int offset      = nroots-shift-1;

      if(feedback != GF_ALPHA0) /* non-zero feedback term */
      {	 guint8 *par_idx = (guint8*)parity;
	 guint8 *e_lut = rt->bLut[feedback]+offset;
	 __m128i par, lut, out; 

	 /* Process lut in 128 bit steps */

	 for(j=nroots_full; j; j--)
	 {  
	    par = _mm_load_si128((__m128i*)par_idx);
	    lut = _mm_loadu_si128((__m128i*)e_lut);    
	    out = _mm_xor_si128(par, lut);
	    _mm_store_si128((__m128i*)par_idx, out);
	    par_idx += 16;
	    e_lut += 16;
	 }

	 parity[shift] = enc_alpha_to[feedback + rs_gpoly[0]];
      }
      else  /* zero feedback term */
	parity[shift] = 0;

      parity += nroots_aligned;
   }
}
#else /* don't have SSE2 */
/* Stub functions to keep the linker happy.
 * Should never be executed.
 */

int ProbeSSE2()
{  return 0;
}

void encode_next_layer_sse2(ReedSolomonTables *rt, unsigned char *data, unsigned char *parity, guint64 layer_size, int shift)
{
   Stop("Mega borkage - EncodeNextLayerSSE2() stub called.\n");
}
#endif /* HAVE_SSE2 */

