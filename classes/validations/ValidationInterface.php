<?php
/**
 * what is validation?
 * validation is that we have a field from a form and that field have a value
 * and we set some rules on that value to make sure it is a correct value
 * that we expect from the user.
 *  
 * validation is set of rules that we do on certain value to check is that value is what we want to store or not.
 * 
 * each rule we will implement it as a class
 * and each rule class has common things:
 *   name:of the field in the form that contain the value <input name="---">
 *   value:
 *   valide() method
 */
namespace validations;

interface ValidationInterface{
    public function __construct($name,$value);
    public function validate();
}