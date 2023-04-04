<?php
/**
 * @category  Paylater
 * @package   SixtySeven_Paylater
 * @author    Developer SixtySeven
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
