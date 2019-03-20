<?php
namespace Omise\Payment\Block\Checkout\Onepage\Success;

class TescoAdditionalInformation extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $_checkoutSession;
    private $resultRedirectFactory;
    private $_objectManager;
    protected $log;
    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Checkout\Model\Session $checkoutSession
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
        \PSR\Log\LoggerInterface $log,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        array $data = []
    ) {
        $this->_objectManager = $objectManager;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->log = $log;
        $this->_checkoutSession = $checkoutSession;
        parent::__construct($context, $data);
    }

    /**
     * Return HTML code with tesco lotus payment infromation
     *
     * @return string
     */
    protected function _toHtml()
    {
        $paymentData = $this->_checkoutSession->getLastRealOrder()->getPayment()->getData();

        $this->log->debug('from logger additional info', ['info' => $paymentData]);
        if (!isset($paymentData['additional_information']['payment_type']) || $paymentData['additional_information']['payment_type'] !== 'bill_payment_tesco_lotus') {
            //return;
        }
        $orderCurrency = $this->_checkoutSession->getLastRealOrder()->getOrderCurrency()->getCurrencyCode();

        $this->addData([
            'tesco_barcode_svg' => "hello", //$paymentData['additional_information']['barcode'],
            'order_amount' => number_format($paymentData['amount_ordered'], 2) . ' ' . $orderCurrency,
        ]);

        return parent::_toHtml();
    }

    /**
     * @param object $order
     * @return string
     */
    public function getReorderUrl()
    {
        return $this->getUrl('omise/order/reorder');
    }
}
