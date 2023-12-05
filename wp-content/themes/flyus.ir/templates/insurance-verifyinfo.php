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
                                ----
                            </td>
                        </tr>
                        <tr>
                            <td>
                                مقصد
                            </td>
                            <td>
                                ------
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
                        <td>13 تا 65 سال</td>
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
                        <td>72787 ریال</td>
                    </tr>
                </table>
                <button class="footer__newsletter-submit" style="margin-top: 3rem;">پرداخت آنلاین</button>
            </div>
        </div>
    </div>