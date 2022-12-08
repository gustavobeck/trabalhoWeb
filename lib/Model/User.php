<?php

namespace Model;

/**
 * Class responsible to create a User object.
 */
class User {

  /**
   * The id.
   *
   * @var int
   */
  private $id;

  /**
   * The name.
   *
   * @var string
   */
  private $name;

  /**
   * The birthday.
   *
   * @var \DateTime
   */
  private $birthday;

  /**
   * The Social number.
   *
   * @var string
   */
  private $cpf;

  /**
   * The email.
   *
   * @var string
   */
  private $email;

  /**
   * The phone number.
   *
   * @var string
   */
  private $phone;

  /**
   * The username.
   *
   * @var string
   */
  private $username;

  /**
   * The password.
   *
   * @var string
   */
  private $password;

  /**
   * The construct function.
   *
   * @param int $id
   *   The id.
   * @param string $name
   *   The name.
   * @param \DateTime $birthday
   *   The birth date.
   * @param string $cpf
   *   The social number.
   * @param string $email
   *   The email.
   * @param string $phone
   *   The phone number.
   * @param string $username
   *   The username.
   * @param string $password
   *   The password.
   */
  public function __construct(int $id = NULL, string $name, \DateTime $birthday, string $cpf, string $email, string $phone, string $username, string $password) {
    $this->id = $id;
    $this->name = $name;
    $this->birthday = $birthday;
    $this->cpf = str_replace(['.', '-'], '', $cpf);
    $this->email = $email;
    $this->phone = str_replace(['(', ')', ' ', '-'], '', $phone);
    $this->username = $username;
    $this->password = $password;
  }

  /**
   * Get the value of id.
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Get the value of name.
   */
  public function getName() {
    return $this->name;
  }

  /**
   * Set the value of name.
   *
   * @return string
   *   Return the name.
   */
  public function setName($name) {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of birthday.
   */
  public function getBirthday() {
    return $this->birthday;
  }

  /**
   * Set the value of birthday.
   *
   * @return \DateTime
   *   Return the birth date.
   */
  public function setBirthday($birthday) {
    $this->birthday = $birthday;

    return $this;
  }

  /**
   * Get the value of cpf.
   */
  public function getCpf() {
    return $this->cpf;
  }

  /**
   * Set the value of cpf.
   *
   * @return string
   *   Return social number.
   */
  public function setCpf($cpf) {
    $this->cpf = $cpf;

    return $this;
  }

  /**
   * Get the value of email.
   */
  public function getEmail() {
    return $this->email;
  }

  /**
   * Set the value of email.
   *
   * @return string
   *   Return the email.
   */
  public function setEmail($email) {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of phone.
   */
  public function getPhone() {
    return $this->phone;
  }

  /**
   * Set the value of phone.
   *
   * @return string
   *   Return the phone number.
   */
  public function setPhone($phone) {
    $this->phone = $phone;

    return $this;
  }

  /**
   * Get the value of username.
   */
  public function getUsername() {
    return $this->username;
  }

  /**
   * Set the value of username.
   *
   * @return string
   *   Return the username.
   */
  public function setUsername($username) {
    $this->username = $username;

    return $this;
  }

  /**
   * Get the value of password.
   */
  public function getPassword() {
    return $this->password;
  }

  /**
   * Set the value of password.
   *
   * @return string
   *   Return the password.
   */
  public function setPassword($password) {
    $this->password = $password;

    return $this;
  }

}
