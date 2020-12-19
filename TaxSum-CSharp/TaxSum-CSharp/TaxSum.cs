using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace TaxSum_CSharp
{
    public class TaxSum
    {
        private double taxPercent;

        /**
         * TaxSum Library constructor.
         */
        public TaxSum(double taxPercent)
        {
            if (taxPercent <= 0)
            {
                throw new Exception("The TaxSum contructor parameter taxPercent is zero or less. TaxSum is redundant.");
            }

            this.taxPercent = taxPercent;
        }

        public TaxSum(int taxPercent)
        {
            if (taxPercent <= 0)
            {
                throw new Exception("The TaxSum contructor parameter taxPercent is zero or less. TaxSum is redundant.");
            }

            this.taxPercent = Convert.ToDouble(taxPercent);
        }

        public double VatOfAmount(double amount)
        {
            return Convert.ToDouble(amount > 0 ? amount * (this.taxPercent / 100) : 0);
        }

        public double VatOfIncluded(double amount)
        {
            return Convert.ToDouble(amount > 0 ? (amount / (100 + this.taxPercent) * this.taxPercent) : 0);
        }
    }
}
