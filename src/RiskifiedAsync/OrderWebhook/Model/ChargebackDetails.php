<?php namespace RiskifiedAsync\OrderWebhook\Model;
    /**
     * Copyright 2013-2015 Riskified.com, Inc. or its affiliates. All Rights Reserved.
     *
     * Licensed under the Apache License, Version 2.0 (the "License").
     * You may not use this file except in compliance with the License.
     * A copy of the License is located at
     *
     * http://www.apache.org/licenses/LICENSE-2.0.html
     *
     * or in the "license" file accompanying this file. This file is distributed
     * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
     * express or implied. See the License for the specific language governing
     * permissions and limitations under the License.
     */

/**
 * Class ChargebackDetails
 * data model of an existing order's chargeback details
 * @package RiskifiedAsync\OrderWebhook\Model
 */
class ChargebackDetails extends AbstractModel {

    protected $_fields = array(
        'id' => 'string',
        'chargeback_at' => 'datetime',
        'chargeback_currency' => 'string',
        'chargeback_amount' => 'float',
        'reason_code' => 'string',
        'reason_description' => 'string',
        'type' => 'string',
        'mid' => 'string',
        'arn' => 'string',
        'credit_card_company' => 'string',
        'respond_by' => 'datetime',
        'fee_amount' => 'float',
        'fee_currency' => 'string',
        'card_issuer' => 'string',
        'gateway' => 'string',
        'cardholder' => 'string',
        'message' => 'string'
    );
}