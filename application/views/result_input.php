<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!isset($_SESSION['user_data'])) {
    redirect(base_url());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!------ tittle of the browser ---------->
    <title>Result Entry</title>
    <!-- shot icon left top corner of browser -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/prime_logo.png">

    <!--Bootsrap 4 CDN-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/styles.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card">
                <div class="card-header">
                    <!-- <h3>Search your final result</h3> -->
                    <h4>RESULT INPUT WINDOW</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dropdown head">
                            <button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- print admin name from session -->
                                <?php echo $this->session->userdata('user_data')['0']->admin_user_username; ?>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="logout">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="loading-img">
                    <img src="<?php echo base_url(); ?>/assets/img/loading.gif" alt="Please wait">
                </div> -->
                <div class="row card-body">
                    <div class="col-md-2">
                        <div class="list-group"><a href="insert-student" class="list-group-item main-menu">New Students</a>
                            <a href="check-student" class="list-group-item active main-menu">Result Entry</a>
                            <a href="result-update" class="list-group-item main-menu">Result Update</a>
                            <a href="check-result" class="list-group-item main-menu">Result Check</a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div>
                                    <form action="checking" method="GET" id="check_student">
                                        <div class="input-group form-group check-input">
                                            <input type="text" class="form-control" minlength="12" maxlength="12" id="stdId" name="stdId" placeholder="Student ID*" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                        </div>
                                        <div class="com-md-12">
                                            <div class="form-group check-button">
                                                <input type="submit" value="Check" class="btn btn-block">
                                            </div>
                                            <div class="form-group">
                                                <input type="button" onclick="reset_sid()" value="Reset" class="btn btn-block">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-8 result_table" id="result_table">
                        <div class="row heading_result">Final Result Entry</div>
                        <div class="row">
                            <div class="col-md-3">
                                <img class="std_image" src="<?php echo base_url(); ?>/assets/img/prime_logo.png" alt="No image found">
                            </div>
                            <div class="col-md-9">
                                <form action="resultInput" method="post">
                                    <table class="">
                                        <tbody>
                                            <tr>
                                                <td class="f_col">ID</td>
                                                <td class="s_col" style="font-weight: bold;">: <?php echo $stdId; ?> <span style="color:red; font-weight:bold">! not editable</span><input type="hidden" name="stdId" id="stdId" value="<?php echo $stdId; ?>"></td>
                                            </tr>
                                            <tr>
                                                <td class="f_col">Name</td>
                                                <td class="s_col">: <input type="text" name="stdName" id="stdName" value="" required></td>
                                            </tr>
                                            <tr>
                                                <td class="f_col">Batch</td>
                                                <td class="s_col">: <select name="stdBatch" id="" required>
                                                        <option value="">--select batch--</option>
                                                        <option value="70th">70th</option>
                                                        <option value="69th">69th</option>
                                                        <option value="68th">68th</option>
                                                        <option value="67th">67th</option>
                                                        <option value="66th">66th</option>
                                                        <option value="65th">65th</option>
                                                        <option value="64th">64th</option>
                                                        <option value="63rd">63rd</option>
                                                        <option value="62nd">62nd</option>
                                                        <option value="61st">61st</option>
                                                        <option value="60th">60th</option>
                                                        <option value="59th">59th</option>
                                                        <option value="58th">58th</option>
                                                        <option value="57th">57th</option>
                                                        <option value="56th">56th</option>
                                                        <option value="55th">55th</option>
                                                        <option value="54th">54th</option>
                                                        <option value="53rd">53rd</option>
                                                        <option value="52nd">52nd</option>
                                                        <option value="51st">51st</option>
                                                        <option value="50th">50th</option>
                                                        <option value="49th">49th</option>
                                                        <option value="48th">48th</option>
                                                        <option value="47th">47th</option>
                                                        <option value="46th">46th</option>
                                                        <option value="45th">45th</option>
                                                        <option value="44th">44th</option>
                                                        <option value="43rd">43rd</option>
                                                        <option value="42nd">42nd</option>
                                                        <option value="41st">41st</option>
                                                        <option value="40th">40th</option>
                                                        <option value="39th">39th</option>
                                                        <option value="38th">38th</option>
                                                        <option value="37th">37th</option>
                                                        <option value="36th">36th</option>
                                                        <option value="35th">35th</option>
                                                        <option value="34th">34th</option>
                                                        <option value="33rd">33rd</option>
                                                        <option value="32nd">32nd</option>
                                                        <option value="31st">31st</option>
                                                        <option value="30th">30th</option>
                                                        <option value="29th">29th</option>
                                                        <option value="28th">28th</option>
                                                        <option value="27th">27th</option>
                                                        <option value="26th">26th</option>
                                                        <option value="25th">25th</option>
                                                        <option value="24th">24th</option>
                                                        <option value="23rd">23rd</option>
                                                        <option value="22nd">22nd</option>
                                                        <option value="21st">21st</option>
                                                        <option value="20th">20th</option>
                                                        <option value="19th">19th</option>
                                                        <option value="18th">18th</option>
                                                        <option value="17th">17th</option>
                                                        <option value="16th">16th</option>
                                                        <option value="15th">15th</option>
                                                        <option value="14th">14th</option>
                                                        <option value="13th">13th</option>
                                                        <option value="12th">12th</option>
                                                        <option value="11th">11th</option>
                                                        <option value="10th">10th</option>
                                                        <option value="9th">9th</option>
                                                        <option value="8th">8th</option>
                                                        <option value="7th">7th</option>
                                                        <option value="6th">6th</option>
                                                        <option value="5th">5th</option>
                                                        <option value="4th">4th</option>
                                                        <option value="3rd">3rd</option>
                                                        <option value="2nd">2nd</option>
                                                        <option value="1st">1st</option>

                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td class="f_col">Department</td>
                                                <td class="s_col">: <select name="stdDpt" id="stdDpt" required>
                                                        <option value="">--depertment--</option>
                                                        <option value="CSE">CSE</option>
                                                        <option value="EEE">EEE</option>
                                                        <option value="CE">CE</option>
                                                        <option value="English">English</option>
                                                        <option value="Bangla">Bangla</option>
                                                        <option value="Law">Law</option>
                                                        <option value="Education">Education</option>
                                                        <option value="Business Administration">Business Administration</option>
                                                        <option value="Master in Computer Applications">Master in Computer Applications</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td class="f_col">Obtained Degree</td>
                                                <td class="s_col">: <select name="stddgr" id="stddgr" required>
                                                        <option value="">--programs--</option>
                                                        <option value="BSc in CSE">BSc in CSE</option>
                                                        <option value="BSc in EEE">BSc in EEE</option>
                                                        <option value="BSc in CE">BSc in CE</option>
                                                        <option value="BA (Hons) in English">BA (Hons) in English</option>
                                                        <option value="MA in English">MA in English</option>
                                                        <option value="BA (Hons) in Bangla">BA (Hons) in Bangla</option>
                                                        <option value="LLB (Preli & Final)">LLB (Preli & Final)</option>
                                                        <option value="LLM (Regular)">LLM (Regular)</option>
                                                        <option value="LLM (Preli & Final)">LLM (Preli & Final)</option>
                                                        <option value="BEd">BEd</option>
                                                        <option value="MEd">MEd</option>
                                                        <option value="BBA">BBA</option>
                                                        <option value="MBA">MBA</option>
                                                    </select></td>
                                            </tr>
                                            <tr>
                                                <td class="f_col">Ending Semester</td>
                                                <td class="s_col">: <select name="stdSmtr" id="stdSmtr" required>
                                                        <option value="">--semester--</option>
                                                        <option value="FALL">FALL</option>
                                                        <option value="SPRING">SPRING</option>
                                                        <option value="SUMMER">SUMMER</option>
                                                    </select>
                                                    <select name="stdYear" id="stdYear" required>
                                                        <option value="">--year--</option>
                                                        <?php
                                                        for ($year = 2002; $year <= 2040; $year++) {
                                                        ?>
                                                            <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="f_col">CGPA</td>
                                                <td class="s_col">: <input type="text" name="cgpa" id="cgpa" required></td>
                                            </tr>
                                            <tr>
                                                <td class="f_col">Published Date</td>
                                                <td class="s_col">: <input type="date" name="pDate" id="pDate" required></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="row subBtn">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Permanent Campus: 114/116 Mazar Road, Mirpur-1, Dhaka 1216, Bangladesh.
                    </div>
                    <div class="d-flex justify-content-center links"><span class="pAddress">(Previous Address: 2A/1, North East of Darussalam Road, Mirpur-1, Dhaka 1216, Bangladesh, since inception in 2002 to 31st January 2017) </span></div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>