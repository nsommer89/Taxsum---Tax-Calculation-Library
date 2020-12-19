<?php

/**
 * Class TaxSum
 * @author Nikolaj Jensen
 */
class TaxSum {
    private $taxPercent;

    /**
     * TaxSum Library constructor.
     * @param float|int $taxPercent
     * @throws Exception
     */
    public function __construct($taxPercent = null)
    {
        if ($taxPercent == null) {
            throw new Exception("Please provide the TaxSum library constructor method a tax percent to work with.");
        }

        if (!is_numeric($taxPercent)) {
            throw new Exception("Tax percent must be a valid integer or float.");
        }

        $this->taxPercent = floatval($taxPercent);
    }

    /**
     * @param float $amount
     * @return float|int
     */
    public function vatOfAmount($amount = 0.00) {
        return floatval($amount > 0 ? $amount * ($this->taxPercent / 100) : 0);
    }

    /**
     * Calculate tax of a given percent by a product where the tax already is added.
     *
     * @param float $amount
     * @return float|int
     */
    public function vatOfIncluded($amount = 0.00) {
        return floatval($amount > 0 ? ($amount / (100 + $this->taxPercent) * $this->taxPercent) : 0);
    }
}