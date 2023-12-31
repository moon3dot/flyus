<?php /* Template Name: insurance verifyinfo */ ?>
<?php get_header(); ?>

<?php

if(isset($_POST["fname"]))
    $name = $_POST['fname'];
    
if(isset($_POST["lastname"]))
    $lastname = $_POST['lastname'];

if(isset($_POST["latin-name"]))
    $latinName = $_POST['latin-name'];

if(isset($_POST["latin-lastname"]))
    $latinLastname = $_POST['latin-lastname'];

if(isset($_POST["birthday"]))
    $birthday = $_POST['birthday'];

if(isset($_POST["persian-birthday"]))
    $persianBirthday = $_POST['persian-birthday'];

if(isset($_POST["passportNumber"]))
    $passportNumber = $_POST['passportNumber'];
    
if(isset($_POST["national-Code"]))
    $nationalCode = $_POST['national-Code'];

if(isset($_POST["visa-type"]))
    $visaType = $_POST['visa-type'];

if(isset($_POST["totalPrice"]))
    $totalPrice = $_POST['totalPrice'];
    session_start();
    $_SESSION["totalPrice"] = $totalPrice;

if(isset($_POST["sendTitle"]))
    $sendTitle = $_POST['sendTitle'];

if(isset($_POST["sendPrice"]))
    $sendPrice = $_POST['sendPrice'];

if(isset($_POST["sendCoverLimit"]))
    $sendCoverLimit = $_POST['sendCoverLimit'];
?>

<?php 
//is_user_logged_in();

function checkedUser() {
    if(is_user_logged_in())
     $actionForm = '/checkOutpage';

     else
     $actionForm = './loginpage';
};
?>

<section class="insurance-navigation">
            <div class="container">

                <ul class="insurance-navigation__list">
                    <li class="insurance-navigation__item passed">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title active">انتخاب بیمه نامه</p>
                        <div class="insurance-navigation__list-bullet"></div>
                    </li>
                    <li class="insurance-navigation__item active">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title active">مشخصات مسافر</p>
                        <div class="insurance-navigation__list-bullet"></div>
                    </li>
                    <li class="insurance-navigation__item">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title">تایید اطلاعات</p>
                        <div class="insurance-navigation__list-bullet"></div>
                    </li>
                    <li class="insurance-navigation__item">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title">بررسی و پرداخت</p>
                        <div class="insurance-navigation__list-bullet"></div>
                    </li>
                    <li class="insurance-navigation__item">
                        <div class="insurance-navigation__icon services-box__icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                        d="M14.9468 2.25H6.71375C4.78075 2.25 3.21375 3.817 3.21375 5.75V18.2498C3.21375 20.1828 4.78075 21.7498 6.71375 21.7498H14.9468C16.8798 21.7498 18.4468 20.1828 18.4468 18.2498V5.75C18.4468 3.817 16.8798 2.25 14.9468 2.25Z"
                                        fill="url(#paint0_linear_5_6620)"></path>
                                <path
                                        d="M3.1875 3.56251C3.1875 2.83763 3.80851 2.25 4.57457 2.25H18.4879C19.254 2.25 19.875 2.83763 19.875 3.56251V20.4375C19.875 21.1623 19.254 21.75 18.4879 21.75H4.57458C3.80852 21.75 3.1875 21.1623 3.1875 20.4375V3.56251Z"
                                        fill="url(#paint1_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.625 18.3436C8.625 18.061 8.85405 17.832 9.13655 17.832H15.8891C16.1716 17.832 16.4007 18.061 16.4007 18.3436C16.4007 18.6261 16.1716 18.8551 15.8891 18.8551H9.13655C8.85405 18.8551 8.625 18.6261 8.625 18.3436Z"
                                      fill="url(#paint2_linear_5_6620)"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M8.0625 9.4295C8.0625 7.0169 10.0181 5.06105 12.4306 5.06055H12.4314C14.8443 5.06055 16.8004 7.0166 16.8004 9.4295C16.8004 11.8424 14.8444 13.7985 12.4314 13.7985C10.0185 13.7985 8.0625 11.8424 8.0625 9.4295ZM10.4233 9.8296C10.4737 11.0334 10.7495 12.0962 11.1586 12.8183C9.9129 12.3501 8.99375 11.2149 8.8364 9.8478L10.4233 9.8296ZM11.1736 9.821C11.2163 10.7798 11.4132 11.6123 11.6865 12.2045C12.0258 12.9397 12.3435 13.0485 12.4314 13.0485C12.5194 13.0485 12.837 12.9397 13.1763 12.2045C13.4524 11.6063 13.6505 10.7631 13.6904 9.7921L11.1736 9.821ZM13.6894 9.04205L11.1722 9.07095C11.2118 8.09825 11.41 7.2535 11.6865 6.6545C12.0258 5.9193 12.3435 5.81055 12.4314 5.81055C12.5194 5.81055 12.837 5.9193 13.1763 6.6545C13.45 7.24755 13.647 8.08155 13.6894 9.04205ZM14.4413 9.7835C14.3961 11.0063 14.1185 12.087 13.7042 12.8183C14.975 12.3409 15.9059 11.1691 16.035 9.7652L14.4413 9.7835ZM16.027 9.01525L14.4396 9.03345C14.3896 7.82795 14.1137 6.76355 13.7042 6.04065C14.9511 6.5092 15.871 7.6463 16.027 9.01525ZM10.4213 9.07955L8.8275 9.09785C8.9552 7.6922 9.8867 6.5187 11.1586 6.04075C10.7439 6.77285 10.4661 7.85515 10.4213 9.07955Z"
                                      fill="url(#paint3_linear_5_6620)"></path>
                                <path
                                        d="M3.21375 3.5625C3.21375 2.83763 3.80137 2.25 4.52625 2.25H5.46136V21.7498H4.52625C3.80137 21.7498 3.21375 21.1622 3.21375 20.4373V3.5625Z"
                                        fill="url(#paint4_linear_5_6620)"></path>
                                <defs>
                                    <linearGradient id="paint0_linear_5_6620" x1="10.8303" y1="2.25" x2="10.8303"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#FFD36D"></stop>
                                        <stop offset="1" stop-color="#FFB300"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_5_6620" x1="19.875" y1="3.29157" x2="8.34655"
                                                    y2="21.0601"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop offset="0.432292" stop-color="#7599C6"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint2_linear_5_6620" x1="8.625" y1="18.8551" x2="17.5261"
                                                    y2="17.832"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white"></stop>
                                        <stop offset="1" stop-color="white" stop-opacity="0"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint3_linear_5_6620" x1="15.8482" y1="4.43826" x2="12.4314"
                                                    y2="13.7985"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="white" stop-opacity="0.62"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                    <linearGradient id="paint4_linear_5_6620" x1="4.33755" y1="2.25" x2="4.33755"
                                                    y2="21.7498"
                                                    gradientUnits="userSpaceOnUse">
                                        <stop stop-color="#7599C6"></stop>
                                        <stop offset="1" stop-color="white"></stop>
                                    </linearGradient>
                                </defs>
                            </svg>
                        </div>
                        <p class="insurance-navigation__title">صدور بیمه نامه </p>
                    </li>
                </ul>

            </div>
            <div class="navigation__left-shadow shadow-left left shadow"></div>
            <div class="navigation__right-shadow shadow-right right shadow"></div>
        </section>
<div class="container">
        <div class="row hotel hotel-box">
            <div class="col-md-12">
                <table class="table-price">
                    <thead>
                        <tr>
                            <th style="text-align: right;" colspan="3">
                                اطلاعات بیمه نامه
                                مسافرتی</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                بیمه گر
                            </td>
                            <td>
                                <?php echo  $sendPrice ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                مدت بیمه
                            </td>
                            <td>
                                روز <?php echo $_SESSION['single_travel_time'] ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                مقصد
                            </td>
                            <td>
                              <?php echo $_SESSION['single_insurance_destination_name'] ?> 
                            </td>
                        </tr>
                        <tr>
                            <td>
                                تعهد مالی
                            </td>
                            <td>
                            یورو <?php echo  $sendCoverLimit ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                شرکت کمک رسان
                            </td>
                            <td>
                                Mideast Assistance
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row hotel hotel-box">
            <div class="col-md-12">
                <table class="table-price">
                    <thead>
                        <tr>
                            <th style="text-align: right;" colspan="6">
                                مشخصات مسافران</th>
                        </tr>
                        <tr>
                        <th>نام و نام خانوادگی</th>
                        <th>تاریخ تولد</th>
                        <th>شماره پاسپورت</th>
                        <th>کد ملی</th>
                        <th>بازه سنی</th>
                        <th>قیمت</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td><?php echo $name.' '.$lastname ?></td>
                        <td><?php echo $birthday ?></td>
                        <td><?php echo $passportNumber ?></td>
                        <td><?php echo $nationalCode ?></td>
                        <td>
                            
<?php if ( $_SESSION['age_12'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                1 تا 12 سال (<?php echo $_SESSION['age_12'] ?>نفر)
              </span>
							<?php } ?>
							<?php if ( $_SESSION['age_13'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                13 تا 66 سال (<?php echo $_SESSION['age_13'] ?>نفر)
              </span>
							<?php } ?>
							<?php if ( $_SESSION['age_66'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                66 تا 71 سال (<?php echo $_SESSION['age_66'] ?>نفر)
              </span>
							<?php } ?>
							<?php if ( $_SESSION['age_71'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                71 تا 76 سال (<?php echo $_SESSION['age_71'] ?>نفر)
              </span>
							<?php } ?>
							<?php if ( $_SESSION['age_76'] > 0 ) { ?>
                                <span class="insurance__head-price-detail">
                76 تا 81 سال (<?php echo $_SESSION['age_76'] ?>نفر)
              </span>
							<?php } ?>


                        </td>
                        <td><?php echo $totalPrice ?>ریال</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row hotel hotel-box">
            <div class="col-md-8">
                <button class="insurance-form__add" style="margin-top: 3rem;">بازگشت</button>

            </div>
            <div class="col-md-4" style="text-align: center;">
                <table class="table-price">
                    <tr>
                        <td>مبلغ قابل پرداخت</td>
                        <td><?php echo $totalPrice ?>ریال</td>
                    </tr>
                </table>
                <?php 
if ( is_user_logged_in() ) {
   $URL_send_form='/checkout';
} else {
    $URL_send_form='/wp-admin';
}
?>

                <form action="<?php echo $URL_send_form ?>">
                    <button class="footer__newsletter-submit" style="margin-top: 3rem;" >پرداخت آنلاین</button>
                </form>
                
            </div>
        </div>
    </div>