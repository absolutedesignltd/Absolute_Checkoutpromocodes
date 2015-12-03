<?php
/**
 * @category    Absolute
 * @package     Absolute_Checkoutpromocodes
 */


require_once 'Mage/Checkout/controllers/OnepageController.php';
class Absolute_Checkoutpromocodes_OnepageController extends Mage_Checkout_OnepageController
{
    
    function couponAction() {

        $this->loadLayout('checkout_onepage_review');

        $this->couponCode = (string) $this->getRequest()->getParam('coupon_code');

        Mage::getSingleton('checkout/cart')->getQuote()->getShippingAddress()->setCollectShippingRates(true);

        Mage::getSingleton('checkout/cart')->getQuote()->setCouponCode(strlen($this->couponCode) ? $this->couponCode : '')->collectTotals()->save();

        $result['goto_section'] = 'review';

        $result['update_section'] = array( 'name' => 'review', 'html' => $this->_getReviewHtml() );

        $this->getResponse()->setBody(Mage::helper('core')->jsonEncode($result));

    }

    
}
