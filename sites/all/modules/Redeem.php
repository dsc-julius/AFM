<?php
namespace Rewards\Form;
 
use Zend\Form\Annotation;
 
/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("Redeem")
 * @Annotation\Attributes({"class":"form-horizontal"})
 */
class Redeem
{
    /**
     * @Annotation\Type("Zend\Form\Element\Hidden")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Attributes({"value":"redeem-nonce"})
     */
    public $nonce;

    /**
     * @Annotation\Type("Zend\Form\Element\Hidden")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Attributes({"class":"form-control", "id" : "redeem-id"})
     */
    public $id;

    /**
     * @Annotation\Type("Zend\Form\Element\Hidden")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Attributes({"class":"form-control", "id" : "redeem-value", "value": 2})
     */
    public $reward_id;
    
    /**
     * @Annotation\Type("Zend\Form\Element\Hidden") 
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Attributes({"class":"form-control", "id" : "redeem-address"})
     */
    public $address;

    /** 
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"value_options":{
     *      "":"Select Points to Redeem", 
     *      "10000":"10,000 points",
     *      "20000":"20,000 points",
     *      "30000":"30,000 points",
     *      "40000":"40,000 points",
     *      }
     * })
     * @Annotation\Attributes({"class":"form-control", "id" : "redeem-points"})
     */
    public $points;
    
    /** 
     * @Annotation\Type("Zend\Form\Element\Select")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"value_options":{
     *      "":"Select Kind of Voucher", 
     *      "Coles":"Coles",
     *      "Westfield":"Westfield",
     *      "Woolworths":"Woolworths",
     *      }
     * })
     * @Annotation\Attributes({"class":"form-control", "id" : "voucher"})
     */
    public $voucher;


    /**
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Attributes({"id" : "redeem-confirm"})
     */
    public $confirm;
    
    /**
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Attributes({"id" : "redeem-confirm2"})
     */
    public $confirm2;

    /**
     * @Annotation\Type("Zend\Form\Element\Submit")
     * @Annotation\Attributes({"value":"Add"})
     */
    public $submit;
}
?>