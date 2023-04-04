<?php
/**
 * @category  Paylater
 * @package   SixtySeven_Paylater
 * @author    Developer SixtySeven
 */

namespace SixtySeven\Paylater\Setup;

use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(
        EavSetupFactory $eavSetupFactory,
        Config $eavConfig
    ) {
        $this->eavSetupFactory = $eavSetupFactory;
        $this->eavConfig       = $eavConfig;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        // Yes/No Field
        $eavSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'allow_paylater', [
            'label'      => __('Enable pay by invoice for this customer'),
            'system'     => 0,
            'position'   => 720,
            'sort_order' => 720,
            'visible'    => true,
            'note'       => '',
            'type'       => 'int',
            'input'      => 'boolean',
            'source'     => 'Magento\Eav\Model\Entity\Attribute\Source\Boolean',
        ]
        );

        $this->getEavConfig()->getAttribute('customer', 'allow_paylater')->setData('is_user_defined', 0)->setData('is_required', 0)->setData('default_value', '')->setData('used_in_forms', ['adminhtml_customer', 'customer_account_edit'])->save();
    }

    public function getEavConfig()
    {
        return $this->eavConfig;
    }
}
