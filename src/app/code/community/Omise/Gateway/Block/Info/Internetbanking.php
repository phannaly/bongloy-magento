<?php
/**
 * Internet banking payment info
 */
class Omise_Gateway_Block_Info_InternetBanking extends Mage_Payment_Block_Info {

    /**
     * Prepare internet banking related payment info
     *
     * @param Varien_Object|array $transport
     * @return Varien_Object
     */
    protected function _prepareSpecificInformation($transport = null)
    {
        if (null !== $this->_paymentSpecificInformation) {
            return $this->_paymentSpecificInformation;
        }

        $transport = parent::_prepareSpecificInformation($transport);

        $info = $this->getInfo()->getAdditionalInformation();

        $data = [ Mage::helper('omise_gateway')->__('Bank') => Mage::helper('omise_gateway')->internetBankingName($info['type']) ];

        return $transport->setData(array_merge($data, $transport->getData()));
    }

}
