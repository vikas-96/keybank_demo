<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssetDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $details = parent::toArray($request);
        $valuation = $this->valuation;
        if (!empty($valuation)) {
            $valuation['fair_market_value_avg'] = isset($this->valuation['fair_market_value_1']) ? money_format("%.0n", $this->valuation['fair_market_value_1']) : null;
            $valuation["realizable_value_avg"] = isset($this->valuation['realizable_value_1']) ? money_format("%.0n", $this->valuation['realizable_value_1']) : null;
            $valuation["distress_value_avg"] = isset($this->valuation['forced_sale_value_1']) ? money_format("%.0n", $this->valuation['forced_sale_value_1']) : null;

            if (isset($valuation['fair_market_value_1']) && isset($valuation['fair_market_value_2'])) {
                $valuation['fair_market_value_avg'] = money_format("%.0n", ($valuation['fair_market_value_1'] + $valuation['fair_market_value_2']) / 2);
            }
            if (isset($valuation['realizable_value_1']) && isset($valuation['realizable_value_2'])) {
                $valuation['realizable_value_avg'] = money_format("%.0n", ($valuation['realizable_value_1'] + $valuation['realizable_value_2']) / 2);
            }
            if (isset($valuation['forced_sale_value_1']) && isset($valuation['forced_sale_value_2'])) {
                $valuation['distress_value_avg'] = money_format("%.0n", ($valuation['forced_sale_value_1'] + $valuation['forced_sale_value_2']) / 2);
            }
            $details['valuation'] = $valuation;
        }
        return $details;
    }
}
