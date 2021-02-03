<head>
    <title>Form 3</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<form action="index.php" method="POST" name="form" onSubmit="return validateForm();">

    <div class="box">
        <h4 class="heading">Sign Up</h4>
        <div class="align">
            <label class="label-100">First Name</label>
            <input type="text" class="input" name="fname" placeholder="Enter First Name" />
        </div>

        <div class="align">
            <label class="label-100">Last Name</label>
            <input type="text" placeholder="Enter Last Name" class="input" name="lname" />
        </div>

        <div class="align">
            <label class="label-100">Date of Birth</label>
            <div class="input">
                
                <select name="date">
                    <option>Date</option>
                    <option value=1>1</option>
                    <option value=2>2</option>
                    <option value=3>3</option>
                    <option value=4>4</option>
                    <option value=5>5</option>
                    <option value=6>6</option>
                    <option value=7>7</option>
                    <option value=8>8</option>
                    <option value=9>9</option>
                    <option value=10>10</option>
                    <option value=11>11</option>
                    <option value=12>12</option>
                    <option value=13>13</option>
                    <option value=14>14</option>
                    <option value=15>15</option>
                    <option value=16>16</option>
                    <option value=17>17</option>
                    <option value=18>18</option>
                    <option value=19>19</option>
                    <option value=20>20</option>
                    <option value=21>21</option>
                    <option value=22>22</option>
                    <option value=23>23</option>
                    <option value=24>24</option>
                    <option value=25>25</option>
                    <option value=26>26</option>
                    <option value=27>27</option>
                    <option value=28>28</option>
                    <option value=29>29</option>
                    <option value=30>30</option>
                    <option value=31>31</option>

                </select>
                &nbsp;
                <select name="month">
                    <option>Month</option>
                    <option value=1>January</option>
                    <option value="2">February</option>
                    <option value=3>March</option>
                    <option value=4>April</option>
                    <option value=5>May</option>
                    <option value=6>June</option>
                    <option value=7>July</option>
                    <option value=8>August</option>
                    <option value=9>september</option>
                    <option value=10>october</option>
                    <option value=11>november</option>
                    <option value=12>december</option>
                </select>
                &nbsp;
                <select name="year">
                    <option>Year</option>
                    <option value=1990>1990</option>
                    <option value=1991>1991</option>
                    <option value=1992>1992</option>
                    <option value=1993>1993</option>
                    <option value=1994>1994</option>
                    <option value=1995>1995</option>
                    <option value=1996>1996</option>
                    <option value=1997>1997</option>
                    <option value=1998>1998</option>
                    <option value=1999>1999</option>
                    <option value=2000>2000</option>
                    <option value=2001>2001</option>
                    <option value=2002>2002</option>
                    <option value=2003>2003</option>
                    <option value=2004>2004</option>
                    <option value=2005>2005</option>
                    <option value=2006>2006</option>
                    <option value=2007>2007</option>
                    <option value=2008>2008</option>
                    <option value=2009>2009</option>
                    <option value=2010>2010</option>
                    <option value=2011>2011</option>
                    <option value=2012>2012</option>
                    <option value=2013>2013</option>
                    <option value=2014>2014</option>
                    <option value=2015>2015</option>
                    <option value=2016>2016</option>
                    <option value=2017>2017</option>
                    <option value=2018>2018</option>
                    <option value=2019>2019</option>
                    <option value=2020>2020</option>
                    <option value=2021>2021</option>

                </select>

            </div>
        </div>


        <div class="align">
            <label class="label-100">Gender</label>
            <div class="input">
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
            </div>
        </div>
        <div class="align">
            <label class="label-100">Country</label>
            <div class="input">

                <select id="country" name="country">
                    <option>Country</option>
                    <option value="Afganistan">Afghanistan</option>
                    <option value="Albania">Albania</option>
                    <option value="Algeria">Algeria</option>
                    <option value="American Samoa">American Samoa</option>
                    <option value="Andorra">Andorra</option>
                    <option value="Angola">Angola</option>
                    <option value="Anguilla">Anguilla</option>
                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                    <option value="Argentina">Argentina</option>
                    <option value="Armenia">Armenia</option>
                    <option value="Aruba">Aruba</option>
                    <option value="Australia">Australia</option>
                    <option value="Austria">Austria</option>
                    <option value="Azerbaijan">Azerbaijan</option>
                    <option value="Bahamas">Bahamas</option>
                    <option value="Bahrain">Bahrain</option>
                    <option value="Bangladesh">Bangladesh</option>
                    <option value="Barbados">Barbados</option>
                    <option value="Belarus">Belarus</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Belize">Belize</option>
                    <option value="Benin">Benin</option>
                    <option value="Bermuda">Bermuda</option>
                    <option value="Bhutan">Bhutan</option>
                    <option value="Bolivia">Bolivia</option>
                    <option value="Bonaire">Bonaire</option>
                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                    <option value="Botswana">Botswana</option>
                    <option value="Brazil">Brazil</option>
                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                    <option value="Brunei">Brunei</option>
                    <option value="Bulgaria">Bulgaria</option>
                    <option value="Burkina Faso">Burkina Faso</option>
                    <option value="Burundi">Burundi</option>
                    <option value="Cambodia">Cambodia</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Canada">Canada</option>
                    <option value="Canary Islands">Canary Islands</option>
                    <option value="Cape Verde">Cape Verde</option>
                    <option value="Cayman Islands">Cayman Islands</option>
                    <option value="Central African Republic">Central African Republic</option>
                    <option value="Chad">Chad</option>
                    <option value="Channel Islands">Channel Islands</option>
                    <option value="Chile">Chile</option>
                    <option value="China">China</option>
                    <option value="Christmas Island">Christmas Island</option>
                    <option value="Cocos Island">Cocos Island</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Comoros">Comoros</option>
                    <option value="Congo">Congo</option>
                    <option value="Cook Islands">Cook Islands</option>
                    <option value="Costa Rica">Costa Rica</option>
                    <option value="Cote DIvoire">Cote DIvoire</option>
                    <option value="Croatia">Croatia</option>
                    <option value="Cuba">Cuba</option>
                    <option value="Curaco">Curacao</option>
                    <option value="Cyprus">Cyprus</option>
                    <option value="Czech Republic">Czech Republic</option>
                    <option value="Denmark">Denmark</option>
                    <option value="Djibouti">Djibouti</option>
                    <option value="Dominica">Dominica</option>
                    <option value="Dominican Republic">Dominican Republic</option>
                    <option value="East Timor">East Timor</option>
                    <option value="Ecuador">Ecuador</option>
                    <option value="Egypt">Egypt</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                    <option value="Eritrea">Eritrea</option>
                    <option value="Estonia">Estonia</option>
                    <option value="Ethiopia">Ethiopia</option>
                    <option value="Falkland Islands">Falkland Islands</option>
                    <option value="Faroe Islands">Faroe Islands</option>
                    <option value="Fiji">Fiji</option>
                    <option value="Finland">Finland</option>
                    <option value="France">France</option>
                    <option value="French Guiana">French Guiana</option>
                    <option value="French Polynesia">French Polynesia</option>
                    <option value="French Southern Ter">French Southern Ter</option>
                    <option value="Gabon">Gabon</option>
                    <option value="Gambia">Gambia</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Germany">Germany</option>
                    <option value="Ghana">Ghana</option>
                    <option value="Gibraltar">Gibraltar</option>
                    <option value="Great Britain">Great Britain</option>
                    <option value="Greece">Greece</option>
                    <option value="Greenland">Greenland</option>
                    <option value="Grenada">Grenada</option>
                    <option value="Guadeloupe">Guadeloupe</option>
                    <option value="Guam">Guam</option>
                    <option value="Guatemala">Guatemala</option>
                    <option value="Guinea">Guinea</option>
                    <option value="Guyana">Guyana</option>
                    <option value="Haiti">Haiti</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Honduras">Honduras</option>
                    <option value="Hong Kong">Hong Kong</option>
                    <option value="Hungary">Hungary</option>
                    <option value="Iceland">Iceland</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="India">India</option>
                    <option value="Iran">Iran</option>
                    <option value="Iraq">Iraq</option>
                    <option value="Ireland">Ireland</option>
                    <option value="Isle of Man">Isle of Man</option>
                    <option value="Israel">Israel</option>
                    <option value="Italy">Italy</option>
                    <option value="Jamaica">Jamaica</option>
                    <option value="Japan">Japan</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Kazakhstan">Kazakhstan</option>
                    <option value="Kenya">Kenya</option>
                    <option value="Kiribati">Kiribati</option>
                    <option value="Korea North">Korea North</option>
                    <option value="Korea Sout">Korea South</option>
                    <option value="Kuwait">Kuwait</option>
                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                    <option value="Laos">Laos</option>
                    <option value="Latvia">Latvia</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Lesotho">Lesotho</option>
                    <option value="Liberia">Liberia</option>
                    <option value="Libya">Libya</option>
                    <option value="Liechtenstein">Liechtenstein</option>
                    <option value="Lithuania">Lithuania</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Macau">Macau</option>
                    <option value="Macedonia">Macedonia</option>
                    <option value="Madagascar">Madagascar</option>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Malawi">Malawi</option>
                    <option value="Maldives">Maldives</option>
                    <option value="Mali">Mali</option>
                    <option value="Malta">Malta</option>
                    <option value="Marshall Islands">Marshall Islands</option>
                    <option value="Martinique">Martinique</option>
                    <option value="Mauritania">Mauritania</option>
                    <option value="Mauritius">Mauritius</option>
                    <option value="Mayotte">Mayotte</option>
                    <option value="Mexico">Mexico</option>
                    <option value="Midway Islands">Midway Islands</option>
                    <option value="Moldova">Moldova</option>
                    <option value="Monaco">Monaco</option>
                    <option value="Mongolia">Mongolia</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Morocco">Morocco</option>
                    <option value="Mozambique">Mozambique</option>
                    <option value="Myanmar">Myanmar</option>
                    <option value="Nambia">Nambia</option>
                    <option value="Nauru">Nauru</option>
                    <option value="Nepal">Nepal</option>
                    <option value="Netherland Antilles">Netherland Antilles</option>
                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                    <option value="Nevis">Nevis</option>
                    <option value="New Caledonia">New Caledonia</option>
                    <option value="New Zealand">New Zealand</option>
                    <option value="Nicaragua">Nicaragua</option>
                    <option value="Niger">Niger</option>
                    <option value="Nigeria">Nigeria</option>
                    <option value="Niue">Niue</option>
                    <option value="Norfolk Island">Norfolk Island</option>
                    <option value="Norway">Norway</option>
                    <option value="Oman">Oman</option>
                    <option value="Pakistan">Pakistan</option>
                    <option value="Palau Island">Palau Island</option>
                    <option value="Palestine">Palestine</option>
                    <option value="Panama">Panama</option>
                    <option value="Papua New Guinea">Papua New Guinea</option>
                    <option value="Paraguay">Paraguay</option>
                    <option value="Peru">Peru</option>
                    <option value="Phillipines">Philippines</option>
                    <option value="Pitcairn Island">Pitcairn Island</option>
                    <option value="Poland">Poland</option>
                    <option value="Portugal">Portugal</option>
                    <option value="Puerto Rico">Puerto Rico</option>
                    <option value="Qatar">Qatar</option>
                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                    <option value="Republic of Serbia">Republic of Serbia</option>
                    <option value="Reunion">Reunion</option>
                    <option value="Romania">Romania</option>
                    <option value="Russia">Russia</option>
                    <option value="Rwanda">Rwanda</option>
                    <option value="St Barthelemy">St Barthelemy</option>
                    <option value="St Eustatius">St Eustatius</option>
                    <option value="St Helena">St Helena</option>
                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                    <option value="St Lucia">St Lucia</option>
                    <option value="St Maarten">St Maarten</option>
                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                    <option value="Saipan">Saipan</option>
                    <option value="Samoa">Samoa</option>
                    <option value="Samoa American">Samoa American</option>
                    <option value="San Marino">San Marino</option>
                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                    <option value="Saudi Arabia">Saudi Arabia</option>
                    <option value="Senegal">Senegal</option>
                    <option value="Seychelles">Seychelles</option>
                    <option value="Sierra Leone">Sierra Leone</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Slovakia">Slovakia</option>
                    <option value="Slovenia">Slovenia</option>
                    <option value="Solomon Islands">Solomon Islands</option>
                    <option value="Somalia">Somalia</option>
                    <option value="South Africa">South Africa</option>
                    <option value="Spain">Spain</option>
                    <option value="Sri Lanka">Sri Lanka</option>
                    <option value="Sudan">Sudan</option>
                    <option value="Suriname">Suriname</option>
                    <option value="Swaziland">Swaziland</option>
                    <option value="Sweden">Sweden</option>
                    <option value="Switzerland">Switzerland</option>
                    <option value="Syria">Syria</option>
                    <option value="Tahiti">Tahiti</option>
                    <option value="Taiwan">Taiwan</option>
                    <option value="Tajikistan">Tajikistan</option>
                    <option value="Tanzania">Tanzania</option>
                    <option value="Thailand">Thailand</option>
                    <option value="Togo">Togo</option>
                    <option value="Tokelau">Tokelau</option>
                    <option value="Tonga">Tonga</option>
                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                    <option value="Tunisia">Tunisia</option>
                    <option value="Turkey">Turkey</option>
                    <option value="Turkmenistan">Turkmenistan</option>
                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                    <option value="Tuvalu">Tuvalu</option>
                    <option value="Uganda">Uganda</option>
                    <option value="United Kingdom">United Kingdom</option>
                    <option value="Ukraine">Ukraine</option>
                    <option value="United Arab Erimates">United Arab Emirates</option>
                    <option value="United States of America">United States of America</option>
                    <option value="Uraguay">Uruguay</option>
                    <option value="Uzbekistan">Uzbekistan</option>
                    <option value="Vanuatu">Vanuatu</option>
                    <option value="Vatican City State">Vatican City State</option>
                    <option value="Venezuela">Venezuela</option>
                    <option value="Vietnam">Vietnam</option>
                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                    <option value="Wake Island">Wake Island</option>
                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                    <option value="Yemen">Yemen</option>
                    <option value="Zaire">Zaire</option>
                    <option value="Zambia">Zambia</option>
                    <option value="Zimbabwe">Zimbabwe</option>
                </select>
            </div>
        </div>

        <div class="align">
            <label class="label-100">E-mail</label>
            <input type="email" name="email" class="input" placeholder="Enter E-mail">
        </div>

        <div class="align">
            <label class="label-100">Phone</label>
            <input type="tel" minlength="10" maxlength="10" name="phone" class="input" placeholder="Enter Phone">
        </div>

        <div class="align">
            <label class="label-100">Password</label>
            <input type="password" name="password" class="input" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
        </div>

        <div class="align">
            <label class="label-100">Confirm Password</label>
            <input type="password" name="cpassword" class="input">
        </div>

        <div class="align">
            <label class="label-100"></label>
            <div class="input">
                <input type="checkbox" name="terms" value="1" onchange="document.getElementById('submit').disabled = !this.checked;">
                <label>I agree to the Terms of use</label>
                <?php /* if (!isset($_POST['checked'])) {  echo "I agree to the Terms of use"; } */ ?>
            </div>
        </div>
        <div class="heading">
            <div class="btn2">
                <input type="submit" name="submit" id="submit" disabled="disabled" value="Submit" class="btn" />
                <input type="reset" name="reset" id="reset" value="Cancel" class="btn" />
            </div>
        </div>
        <!--            <div class="align">
                <h3>Your given values are as :</h3>
            </div>

            <div class="align">
                <label class="label-100">Your name is :</label>
                <label class="input" name="name">abcd</label>
            </div>
            <div class="align">
                <label class="label-100">Your email is :</label>
                <label class="input" name="email">abcd</label>
            </div>
            <div class="align">
                <label class="label-100">Your class time at :</label>
                <label class="input" name="time">abcd</label>
            </div>
            <div class="align">
                <label class="label-100">Your class info :</label>
                <label class="input" name="info">abcd</label>
            </div>
            <div class="align">
                <label class="label-100">Your gender is :</label>
                <label class="input" name="gender">abcd</label>
            </div>
-->
        <?php
        /*  echo "<h2>Your given values are as :</h2>";
            echo ("<p>Your name is : $name</p>");
            echo ("<p> your email address is : $email</p>");
            echo ("<p>Your class time at :  $course</p>");
            echo ("<p>your class info : $class </p>");
            echo ("<p>your gender is : $gender</p>");

            for ($i = 0; $i < @count($subject); $i++) {
                echo (@$subject[$i] . " ");
            }*/
        ?>

    </div>
</form>





<table border="1" name="table">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>D.O.B.</th>
        <th>Gender</th>
        <th>Country</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
    </tr>


    <?php

    require('connect.php');

    @$fname = $_POST['fname'];
    @$lname = $_POST['lname'];
    @$date = $_POST['date'];
    @$month = $_POST['month'];
    @$year = $_POST['year'];
    @$dob = @$year . "-" . @$month . "-" . @$date;
    @$gender = $_POST['gender'];
    @$country = $_POST['country'];
    @$email = $_POST['email'];
    @$phone = $_POST['phone'];
    @$password = md5($_POST['password']);

    /*INSERT DATA REGION*/
    if (isset($_POST['submit'])) {
        if (isset($fname) && isset($lname) && isset($dob) && isset($gender) && isset($country) && isset($email) && isset($phone)) {
            if (!empty($fname) && !empty($lname) && !empty($dob) && !empty($gender) && !empty($country) && !empty($email) && !empty($phone)) {
                $query = "INSERT into `form3`(`fname`,`lname`,`dob`,`gender`,`country`,`email`,`phone`,`password`) values ('$fname', '$lname', '$dob', '$gender', '$country', '$email', '$phone', '$password')";
                $res = mysqli_query($con, $query);
                if (!$res) {
                    echo '<script> alert("Something goes wrong!") </script>';
                    echo "<script>window.location.replace('http://localhost/cybercom-creation/Excercise/2021-02-01/form3/');</script>";
                }
                if ($res) {
                    echo '<script> alert ("Record inserted successfully!") </script>';
                    echo "<script>window.location.replace('http://localhost/cybercom-creation/Excercise/2021-02-01/form3/');</script>";
                }
            }
        }
    }

    /*INSERT DATA REGION OVER*/

    /*RETRIVE DATA REGION*/

    $query = "SELECT `fname`,`lname`,`dob`,`gender`,`country`,`email`,`phone`,`password` from `form3`";
    if ($query_run = mysqli_query($con, $query)) {
        if (mysqli_num_rows($query_run) == NULL) {
            echo '<script> alert ("No result found!")</script>';
        } else {
            while ($query_row = mysqli_fetch_assoc($query_run)) {
                $fname = $query_row['fname'];
                $lname = $query_row['lname'];
                $dob = $query_row['dob'];
                $gender = $query_row['gender'];
                $country = $query_row['country'];
                $email = $query_row['email'];
                $phone = $query_row['phone'];
                $password = $query_row['password'];
                echo ("<tr>");
                echo ("<td>$fname</td>");
                echo ("<td>$lname</td>");
                echo ("<td>$dob</td>");
                echo ("<td>$gender</td>");
                echo ("<td>$country</td>");
                echo ("<td>$email</td>");
                echo ("<td>$phone</td>");
                echo ("<td>$password</td>");
                echo ("</tr>");
            }
        }
    } else {
        echo mysqli_error('Error!');
    }



    /*RETRIVE DATA REGION OVER*/

    ?>
</table>