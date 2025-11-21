<?php
/**
 * @category  Paylater
 * @package   SD_Paylater
 * @author    Developer SD
 */

namespace SixtySeven\Paylater\Model;

/**
 * Pay In Store payment method model
 */
class PaymentMethod extends \Magento\Payment\Model\Method\AbstractMethod
{
	/** * Payment code
	* 
	* @var string 
	*/
	protected $_code = 'paylater';
}

