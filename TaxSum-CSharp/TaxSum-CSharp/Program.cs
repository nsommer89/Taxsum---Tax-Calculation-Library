using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace TaxSum_CSharp
{
    class Program
    {
        static void Main(string[] args)
        {
            TaxSum TaxSum = new TaxSum(25);

            Console.WriteLine("25% tax of 100 is " + (100 + TaxSum.VatOfAmount(100)));
            Console.WriteLine("The tax calculated back from 100 is " + TaxSum.VatOfIncluded(100));
            Console.ReadLine();
        }
    }
}
