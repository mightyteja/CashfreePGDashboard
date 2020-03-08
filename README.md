This package is still in development. Kindly dont use for production environment.

# Dashboard for Rest Api . 

This package will fetch the Orders, Transactions, Refunds, MarketPlace Settlements from the Cashfree Rest API. 

## Features
### Orders
- Orders Status 
- Order Details

### Transaction
 - Trasactions

### Refunds
 - Refund History
 - Refund Status
 
![](https://tesmachino.com/images/icon_transperant.png)

**Table of Contents**

[TOCM]

[TOC]


#Installation 

Please Install the package using, 

    composer require tesmachino/cashfree

For Laravel version higher than 5.5 the package will be auto-discovered. 

For Version below  **5.5** 
    `Tesmachino\Cashfree\CashfreeServiceProvider::class`

#Usage
## Routes

#####Prefix
> <APP_URL>/cashfree/
>
| Method   | URI                          | Name                      
-----------+------------------------------+---------------------------
| GET | cashfree/cashfree-dashboard  |                           
| GET | cashfree/paymentorderdetails | paymentorderdetails       
| POST| cashfree/paymentorderdetails | paymentOrderdetailswithid 
| GET | cashfree/paymentorderstatus  | paymentorderstatus        
| POST| cashfree/paymentorderstatus  | paymentOrderstatuswithid  
| GET | cashfree/refund              | refund                    
| POST| cashfree/refund              | refundfetch               
| GET | cashfree/refund-single       | refund-single             
| POST| cashfree/refund-single-fetch | refund-single-fetch       
| GET | cashfree/settlement          |                           
| POST| cashfree/settlement-request  | settlement-request        
| GET | cashfree/settlement-result   |                           
| GET |cashfree/transaction-status  | getpaymentstatus          
| POST| cashfree/transaction-status  | transaction-request       
-----------+------------------------------+---------------------------


#Assets

Keys and URI's are stored in config file, 

> php artisan vendor:publish --tag=config --force

The following publishes config files named **cashfree** in config folder 

>    'CASHFREE_ENVIROMENT' => 'TEST',
    'CASHFREE_TEST_URL' => 'https://test.cashfree.com/',
    'CASHFREE_PRODUCTION_URL' => 'https://api.cashfree.com/',
    'CASHFREE_APP_ID' => 'CASHFREE_API',
    'CASHFREE_SECRET' => '<CASHFREE_SECRET>',
    'CASHFREE_MARKETSETTLEMENT_CLIENTID' => 'CASHFREEMARKETPLACE_ID',
    'CASHFREE_MARKETSETTLEMENT_CLIENTSECRET' => 'CASHFREEMARKETPLACE_SECRET_ID',
    'CASHFREE_ORDERINFO_API_URL' => 'https://test.cashfree.com/api/v1/order/info/',
    'CASHFREE_ORDERSTATUS_API_URL' => 'https://test.cashfree.com/api/v1/order/info/status',
    'CASHFREE_TRANSACTION_STATUS_API' => 'https://test.cashfree.com/api/v1/transactions',
    'CASHFREE_PAYMENT_EMAIL_API_URL' => 'https://test.cashfree.com/api/v1/order/email',
    'CASHFREE_REFUND_API' => 'https://test.cashfree.com/api/v1/order/refund',
    'CAHFREE_FETCH_ALL_REFUND_API' => 'https://test.cashfree.com/api/v1/refunds',
    'CASHFREE_FETCH_SINGLE_REFUND_API' => 'https://test.cashfree.com/api/v1/refundStatus/',
    'CASHFREE_GET_LINK' => 'https://test.cashfree.com/api/v1/order/info/link',
    'CASHFREE_SETTLEMENTS_URL' => 'https://test.cashfree.com/api/v1/settlements'

###END