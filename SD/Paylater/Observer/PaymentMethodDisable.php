<?php
/**
 * @category  Paylater
 * @package   SD_Paylater
 * @author    Developer SD
 */
namespace SixtySeven\Paylater\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class PaymentMethodDisable implements ObserverInterface
{
    protected $_customerSession;
    public function __construct(
        \Magento\Customer\Model\Session $customerSession,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->_customerSession = $customerSession;
        $this->_logger          = $logger;
    }
    public function execute(Observer $observer)
    {
        $payment_method_code = $observer->getEvent()->getMethodInstance()->getCode();
        if ($payment_method_code == 'paylater') {
            $result = $observer->getEvent()->getResult();
            if ($this->_customerSession->isLoggedIn()) {
                $customer_allow_paylater = $this->_customerSession->getCustomer()->getAllowPaylater();
                //$this->_logger->info($customer_allow_paylater. ' --test '.$payment_method_code );
                if ($customer_allow_paylater == 0) {
                    $result->setData('is_available', false);
                }
            }
        }
    }
}

