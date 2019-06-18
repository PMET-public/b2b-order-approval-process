<?php

namespace MagentoEse\B2bOrderApprovalProcess\Observer\Sales;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Accorin\OrderApprovals\Cron\ValidatePurchaseOrder;
use Accorin\OrderApprovals\Cron\PurchaseOrderToOrder;


class RunAccorinCron implements ObserverInterface {


    /** @var PurchaseOrderToOrder  */
    private $purchaseOrderToOrder;


    /** @var ValidatePurchaseOrder  */
    private $validatePurchaseOrder;

    /**
     * RunAccornCron constructor.
     * @param ValidatePurchaseOrder $validatePurchaseOrder
     * @param PurchaseOrderToOrder $purchaseOrderToOrder
     */

    public function __construct(ValidatePurchaseOrder $validatePurchaseOrder, PurchaseOrderToOrder $purchaseOrderToOrder){
        $this->validatePurchaseOrder = $validatePurchaseOrder;
        $this->purchaseOrderToOrder = $purchaseOrderToOrder;
    }

    /**
     * @param Observer $observer
     */
    public function execute(
        Observer $observer
    ){
        $this->validatePurchaseOrder->execute();
        $this->purchaseOrderToOrder->execute();
    }
}
