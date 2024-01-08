<?php
require_once('./assets/backend/db.php');
?>
<html>


<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- ======= excel ====== -->
    <script src="assets/js/table2excel.js"></script>
    <!-- ======= pdf ====== -->
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <!-- =============== Navigation ================ -->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="assets/imgs/MRZD - LOGO.png" alt="" class="icon-image">
                        </span>
                        <span class="title">MR Z DEALS (PVT) LTD</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="showSection('dashboardSection')">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="showSection('reportSection')">
                        <span class="icon">
                            <ion-icon name="document-text-outline"></ion-icon>
                        </span>
                        <span class="title">Report</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="showSection('legerSection')">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Leger</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="showSection('transactionSection')">
                        <span class="icon">
                            <ion-icon name="swap-horizontal-outline"></ion-icon>
                        </span>
                        <span class="title">Transaction</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li> -->

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="settings-outline"></ion-icon>
                        </span>
                        <span class="title">Settings</span>
                    </a>
                </li>

                <li>
                    <a href="#" onclick="confirmLogout()">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="topbar-title">
                    <h3>ACCOUNTING BOOK</h3>
                </div>

                <div class="date-icons">
                    <div class="calculator-icon" onclick="toggleCalculator()">
                        <ion-icon name="calculator-outline"></ion-icon>
                    </div>
                    <div class="currentDate">
                        <p id="currentDate"></p>
                    </div>
                </div>

                <div class="calculator-container" id="calculatorContainer">
                    <div>
                        <input type="text" id="calculatorInput" readonly>
                    </div>
                    <br>
                    <div class="calculator-buttons">
                        <button onclick="appendToInput('1')">1</button>
                        <button onclick="appendToInput('2')">2</button>
                        <button onclick="appendToInput('3')">3</button>
                        <button onclick="appendToInput('+')">+</button>
                        <button onclick="appendToInput('4')">4</button>
                        <button onclick="appendToInput('5')">5</button>
                        <button onclick="appendToInput('6')">6</button>
                        <button onclick="appendToInput('-')">-</button>
                        <button onclick="appendToInput('7')">7</button>
                        <button onclick="appendToInput('8')">8</button>
                        <button onclick="appendToInput('9')">9</button>
                        <button onclick="appendToInput('*')">*</button>
                        <button onclick="appendToInput('0')">0</button>
                        <button onclick="clearInput()">C</button>
                        <button onclick="calculate()">=</button>
                        <button onclick="appendToInput('/')">/</button>
                    </div>
                </div>
                <div class="profile-dropdown">

                    <div class="user">
                        <img src="assets/imgs/customer01.jpg" class="user-img" alt="">
                    </div>

                    <ul class="profile-dropdown-list">

                        <li class="profile-dropdown-list-item">
                            <a href="#" onclick="showProfilePopup()">
                                <i class="fa-regular fa-address-card"></i>
                                View Profile
                            </a>
                        </li>
                        <hr />


                        <li class="profile-dropdown-list-item">
                            <a href="#" onclick="confirmLogout()">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                Sign Out
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="profile-popup" id="profilePopup">
                    <div class="pop">
                        <img src="./assets/imgs/customer01.jpg" alt="Profile Image" id="profileImage">
                        <h3 id="profileName">John Doe</h3>
                        <p id="profileEmail">john.doe@example.com</p>
                        <p id="profileRole">Role: User</p>
                        <button onclick="closeProfilePopup()">Close</button>
                    </div>
                </div>

                <div class="logout-popup" id="logoutPopup">
                    <div class="logout-f">
                        <i class="fa fa-power-off iconbtn" aria-hidden="true"></i>
                        <p>
                        <h3>Log out?</h3><br>Are you sure you want to log out of your account?</p>
                        <button onclick="logout()" id="delBtn">Logout</button>
                        <button onclick="cancelLogout()" id="btncancel">Cancel</button>
                    </div>

                </div>
            </div>
            <hr>

            <section id="dashboardSection" class="Dashboard">
                <!-- ======================= Cards ================== -->
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers">1,504</div>
                            <div class="cardName">Asset</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">284</div>
                            <div class="cardName">Liability</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">$7,842</div>
                            <div class="cardName">Equity</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="bag-outline"></ion-icon>
                        </div>
                    </div>
                </div>

                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers">0000</div>
                            <div class="cardName">Cash Balance</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="wallet-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">0000</div>
                            <div class="cardName">Bank Balance</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="business-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">0000</div>
                            <div class="cardName">Due Payments</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="briefcase-outline"></ion-icon>
                        </div>
                    </div>
                </div>

                <!-- ================ Order Details List ================= -->
                <div class="tabular-wrapper">
                    <h3 class="main-title">Finance Data</h3>
                    <div class="search">
                        <label>
                            <input type="text" placeholder="Search here">
                            <ion-icon name="search-outline"></ion-icon>
                        </label>
                    </div>
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Transection Type</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Category</th>
                                    <th>Satus</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>2023-05-01</td>
                                    <td>Expenses</td>
                                    <td>office Supplies</td>
                                    <td>$250</td>
                                    <td>Office Expences</td>
                                    <td>Pending</td>
                                    <td><button>Edit</button></td>
                                </tr>

                                <tr>
                                    <td>2023-05-01</td>
                                    <td>Expenses</td>
                                    <td>office Supplies</td>
                                    <td>$250</td>
                                    <td>Office Expences</td>
                                    <td>Pending</td>
                                    <td><button>Edit</button></td>
                                </tr>

                                <tr>
                                    <td>2023-05-01</td>
                                    <td>Expenses</td>
                                    <td>office Supplies</td>
                                    <td>$250</td>
                                    <td>Office Expences</td>
                                    <td>Pending</td>
                                    <td><button>Edit</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <section id="reportSection" class="section">
                <div class="tabular-wrapper">
                    <div class="report-tools">
                        <button id="downlordexcel">
                            <div>
                                <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <div>
                                <p>Export to Excel</p>
                            </div>
                        </button>
                        <button id="reportpdf">
                            <div>
                                <ion-icon name="document-text-outline"></ion-icon>
                            </div>
                            <div>
                                <p>Export to PDF</p>
                            </div>
                        </button>
                        <button>
                            <div>
                                <ion-icon name="print-outline"></ion-icon>
                            </div>
                            <div>
                                <p>Print</p>
                            </div>
                        </button>
                    </div>


                    <div class="report-header">
                        <div class="report-logo">
                            <img src="assets/imgs/MRZD - LOGO.png" alt="">
                        </div>
                        <div>
                            <div class="business-name">
                                <p>MR Z DEALS (PVT) LTD</p>
                            </div>
                            <div class="balance-sheet">
                                <p>BALANCE SHEET</p>
                            </div>
                            <div class="currentDate" style="padding-top: 15px; font-size: 14px;">
                                <p id="currentDate2"></p>
                            </div>
                        </div>
                        <div class="report-logo">
                            <img src="assets/imgs/MRZD - LOGO.png" alt="">
                        </div>
                    </div>

                    <div class="report-body">
                        <table id="reporttable">
                            <tbody>
                                <tr>
                                    <th colspan="2">Assests</th>
                                </tr>
                                <tr>
                                    <td>Cash</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr>
                                    <td>Bank</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr>
                                    <td>Assest-leger</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr>
                                    <td>Assest-leger</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr>
                                    <td>Assest-leger</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr style="font-weight: bold;">
                                    <td>Total Assests</td>
                                    <td style="border-top: solid 1px; border-bottom: solid 1px;">Rs. 500000</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th colspan="2">Liability</th>
                                </tr>
                                <tr>
                                    <td>Cash</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr>
                                    <td>Bank</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr>
                                    <th colspan="2">Equity</th>
                                </tr>
                                <tr>
                                    <td>Cash</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr>
                                    <td>Bank</td>
                                    <td>Rs. 100000</td>
                                </tr>
                                <tr style="font-weight: bold;">
                                    <td>Total Liability & Equity</td>
                                    <td style="border-top: solid 1px; border-bottom: solid 1px;">Rs. 500000</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="report-footer">

                    </div>
                </div>
            </section>

            <section id="legerSection" class="section">
                <div class="tabular-wrapper">
                    <div class="leger-header">
                        <div class="section-header-1">
                            <div class="section-title">
                                <h3>Leger Details</h3>
                            </div>

                            <div class="report-tools">
                                <div class="add-button">
                                    <button id="add-leger-btn">
                                        <ion-icon name="add-outline"></ion-icon> Add Leger
                                    </button>
                                </div>
                                <div class="excel-download-button">
                                    <button>
                                        <ion-icon name="cloud-download-outline"></ion-icon> Download Excel
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="section-header-2">
                            <div class="filter-Cetegory">
                                <label for="filter-Category-Dropdown">Filter Leger:</label>
                                <select id="filter-Category-Dropdown">
                                    <option value="all">All</option>
                                    <option value="assets">Assets</option>
                                    <option value="liability">Liability</option>
                                    <option value="equity">Equity</option>
                                </select>
                            </div>
                            <div class="report-tools">
                                <button id="legerdata">
                                    <div>
                                        <ion-icon name="document-text-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p>Export to Excel</p>
                                    </div>
                                </button>
                                <button id="legerpdf">
                                    <div>
                                        <ion-icon name="document-text-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p>Export to PDF</p>
                                    </div>
                                </button>
                                <button>
                                    <div>
                                        <ion-icon name="print-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p>Print</p>
                                    </div>
                                </button>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="Search here">
                            </div>
                        </div>
                    </div>

                    <div class="leger-body">
                        <table border="1" id="lagertable">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkbox-container">
                                            <input type="checkbox" id="legerHeaderCheckbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    <th>
                                        Name of Ledgers
                                    </th>
                                    <th>
                                        Current Balance
                                    </th>
                                </tr>
                            </thead>
                            <?php

                            $qry1 = "SELECT * FROM `account`";
                            $ret = mysqli_query($conn, $qry1);
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>

                                <tbody>
                                    <tr>
                                        <td class="checkbox-cell">
                                            <label class="checkbox-container">
                                                <input type="checkbox" class="legerCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td class="action-cell">
                                            <div class="action-container">
                                                <div class="action-dropdown">
                                                    <div class="action-button">
                                                        <p>Action</p>
                                                        <ion-icon name="caret-down-outline"></ion-icon>
                                                    </div>
                                                    <div class="action-dropdown-content">
                                                        <a id="view-leger-btn" href="#"><ion-icon name="eye-outline"></ion-icon> View</a>
                                                        <a id="edit-leger-btn" href="#"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                                        <a href="#"><ion-icon name="trash-outline"></ion-icon>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $row['a_name']; ?></td>
                                        <td><?php echo $row['a_balance']; ?></td>
                                    </tr>

                                </tbody>
                            <?php } ?>
                        </table>
                    </div>

                    <div class="section-footer">
                        <div class="delete-button">
                            <button>
                                <ion-icon name="trash-outline"></ion-icon> Delete Selected
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <section id="transactionSection" class="section">
                <div class="tabular-wrapper">
                    <div class="transactions-header">
                        <div class="section-header-1">
                            <div class="section-title">
                                <h3>Transaction Details</h3>
                            </div>

                            <div class="report-tools">
                                <div class="add-button">
                                    <button id="add-transaction-btn">
                                        <ion-icon name="add-outline"></ion-icon> Add Transaction
                                    </button>
                                </div>
                                <div class="excel-download-button">
                                    <button>
                                        <ion-icon name="cloud-download-outline"></ion-icon> Download Excel
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="section-header-2">
                            <div class="filter-Cetegory">
                                <label for="filter-Category-Dropdown">Filter By Date:</label>
                                <select id="filter-Category-Dropdown">
                                    <option value="all">All</option>
                                    <option value="all">Today</option>
                                    <option value="all">Yesterday</option>
                                    <option value="assets">Last Week</option>
                                    <option value="liability">Last Month</option>
                                    <option value="equity">Last Year</option>
                                </select>
                            </div>
                            <div class="report-tools">
                                <button id="transectiondata">
                                    <div>
                                        <ion-icon name="document-text-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p>Export to Excel</p>
                                    </div>
                                </button>
                                <button id="transectionpdf">
                                    <div>
                                        <ion-icon name="document-text-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p>Export to PDF</p>
                                    </div>
                                </button>
                                <button>
                                    <div>
                                        <ion-icon name="print-outline"></ion-icon>
                                    </div>
                                    <div>
                                        <p>Print</p>
                                    </div>
                                </button>
                            </div>
                            <div class="search-input">
                                <input type="text" placeholder="Search here">
                            </div>
                        </div>
                    </div>

                    <div class="leger-body">
                        <table border="1" id="transectiontable">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkbox-container">
                                            <input type="checkbox" id="transactionHeaderCheckbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Amount</th>
                                    <th>Document</th>
                                </tr>
                            </thead>
                            <?php
                            $qry1 = "SELECT * FROM `transactions`";
                            $ret = mysqli_query($conn, $qry1);
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>

                                <tbody>
                                    <tr>
                                        <td class="checkbox-cell">
                                            <label class="checkbox-container">
                                                <input type="checkbox" class="transactionCheckbox">
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td class="action-cell">
                                            <div class="action-container">
                                                <div class="action-dropdown">
                                                    <div class="action-button">
                                                        <p>Action</p>
                                                        <ion-icon name="caret-down-outline"></ion-icon>
                                                    </div>
                                                    <div class="action-dropdown-content">
                                                        <a id="view-transation-btn" href="#"><ion-icon name="eye-outline"></ion-icon> View</a>
                                                        <a id="edit-transation-btn" href="#"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                                        <a href="#"><ion-icon name="trash-outline"></ion-icon>Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo $row['trans_date']; ?></td>
                                        <td><?php echo $row['trans_desc']; ?></td>
                                        <td><?php echo $row['trans_from']; ?></td>
                                        <td><?php echo $row['trans_to']; ?></td>
                                        <td><?php echo $row['trans_amount']; ?></td>
                                        <td>
                                            <button class="fetch-button" onclick="showImages('<?php echo $row['trans_attach']; ?>')">
                                                <div>
                                                    <ion-icon name="document-text-outline"></ion-icon>
                                                </div>
                                                <div>
                                                    <p>Export</p>
                                                </div>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                            <!-- <tbody>
                                <tr>
                                    <td class="checkbox-cell">
                                        <label class="checkbox-container">
                                            <input type="checkbox" class="transactionCheckbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="action-cell">
                                        <div class="action-container">
                                            <div class="action-dropdown">
                                                <div class="action-button">
                                                    <p>Action</p>
                                                    <ion-icon name="caret-down-outline"></ion-icon>
                                                </div>
                                                <div class="action-dropdown-content">
                                                    <a id="view-transation-btn" href="#"><ion-icon name="eye-outline"></ion-icon> View</a>
                                                    <a id="edit-transation-btn" href="#"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                                    <a href="#"><ion-icon name="trash-outline"></ion-icon>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="action-cell">2023/11/03</td>
                                    <td>Bank deposit</td>
                                    <td>Cash</td>
                                    <td>Bank</td>
                                    <td>Amount</td>
                                    <td>
                                        <button class="fetch-button">
                                            <div>
                                                <ion-icon name="document-text-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p>Export</p>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="checkbox-cell">
                                        <label class="checkbox-container">
                                            <input type="checkbox" class="transactionCheckbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="action-cell">
                                        <div class="action-container">
                                            <div class="action-dropdown">
                                                <div class="action-button">
                                                    <p>Action</p>
                                                    <ion-icon name="caret-down-outline"></ion-icon>
                                                </div>
                                                <div class="action-dropdown-content">
                                                    <a href="#"><ion-icon name="eye-outline"></ion-icon> View</a>
                                                    <a href="#"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                                    <a href="#"><ion-icon name="trash-outline"></ion-icon>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="action-cell">2023/11/03</td>
                                    <td>Bank deposit</td>
                                    <td>Cash</td>
                                    <td>Bank</td>
                                    <td>Amount</td>
                                    <td>
                                        <button class="fetch-button">
                                            <div>
                                                <ion-icon name="document-text-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p>Export</p>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="checkbox-cell">
                                        <label class="checkbox-container">
                                            <input type="checkbox" class="transactionCheckbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="action-cell">
                                        <div class="action-container">
                                            <div class="action-dropdown">
                                                <div class="action-button">
                                                    <p>Action</p>
                                                    <ion-icon name="caret-down-outline"></ion-icon>
                                                </div>
                                                <div class="action-dropdown-content">
                                                    <a href="#"><ion-icon name="eye-outline"></ion-icon> View</a>
                                                    <a href="#"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                                    <a href="#"><ion-icon name="trash-outline"></ion-icon>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="action-cell">2023/11/03</td>
                                    <td>Bank deposit</td>
                                    <td>Cash</td>
                                    <td>Bank</td>
                                    <td>Amount</td>
                                    <td>
                                        <button class="fetch-button">
                                            <div>
                                                <ion-icon name="document-text-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p>Export</p>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="checkbox-cell">
                                        <label class="checkbox-container">
                                            <input type="checkbox" class="transactionCheckbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="action-cell">
                                        <div class="action-container">
                                            <div class="action-dropdown">
                                                <div class="action-button">
                                                    <p>Action</p>
                                                    <ion-icon name="caret-down-outline"></ion-icon>
                                                </div>
                                                <div class="action-dropdown-content">
                                                    <a href="#"><ion-icon name="eye-outline"></ion-icon> View</a>
                                                    <a href="#"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                                    <a href="#"><ion-icon name="trash-outline"></ion-icon>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="action-cell">2023/11/03</td>
                                    <td>Bank deposit</td>
                                    <td>Cash</td>
                                    <td>Bank</td>
                                    <td>Amount</td>
                                    <td>
                                        <button class="fetch-button">
                                            <div>
                                                <ion-icon name="document-text-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p>Export</p>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="checkbox-cell">
                                        <label class="checkbox-container">
                                            <input type="checkbox" class="transactionCheckbox">
                                            <span class="checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="action-cell">
                                        <div class="action-container">
                                            <div class="action-dropdown">
                                                <div class="action-button">
                                                    <p>Action</p>
                                                    <ion-icon name="caret-down-outline"></ion-icon>
                                                </div>
                                                <div class="action-dropdown-content">
                                                    <a href="#"><ion-icon name="eye-outline"></ion-icon> View</a>
                                                    <a href="#"><ion-icon name="create-outline"></ion-icon> Edit</a>
                                                    <a href="#"><ion-icon name="trash-outline"></ion-icon>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="action-cell">2023/11/03</td>
                                    <td>Bank deposit</td>
                                    <td>Cash</td>
                                    <td>Bank</td>
                                    <td>Amount</td>
                                    <td>
                                        <button class="fetch-button">
                                            <div>
                                                <ion-icon name="document-text-outline"></ion-icon>
                                            </div>
                                            <div>
                                                <p>Export</p>
                                            </div>
                                        </button>
                                    </td>
                                </tr>
                            </tbody> -->
                        </table>
                    </div>

                    <div class="section-footer">
                        <div class="delete-button">
                            <button onclick="confirmDelete()">
                                <ion-icon name="trash-outline"></ion-icon> Delete Selected
                            </button>
                        </div>
                    </div>
                    <div class="logout-popup" id="DeletePopup">
                        <div class="logout-f">
                            <ion-icon name="close-circle-outline" class="iconbtn"></ion-icon>
                            <p>
                            <h3>Are you sure?</h3><br>Do you really want to delete theae records? <br>This proccess cannot bdd undone.</p>
                            <button onclick=" cancelDelete()" id="btncancel">Cancel</button>
                            <button onclick="Delete()" id="delBtn">Delete</button>
                        </div>
                    </div>
            </section>
        </div>
    </div>

    <!-- =========== POP UP ADD FORMS =========  -->
    <!-- Leger Add Form -->
    <!-- <div id="legerAddForm" class="form">
        <div class="form-header">
            <div>
                <h3>Leger Form</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>
        <div class="form-body">
            <input type="text" placeholder="Enter leger name">
            <div class="custom-select">
                <select id="leger-type">
                    <option value="">Select leger type</option>
                    <option value="assets">Assets</option>
                    <option value="liability">Liability</option>
                    <option value="equity">Equity</option>
                </select>
            </div>
        </div>
        <div class="form-footer">
            <button id="addBtnLeger" class="add-btn">Create</button>
            <button id="closeBtnLeger" class="close-btn">Close</button>
        </div>
    </div> -->

    <div id="legerAddForm" class="form">
        <div class="form-header">
            <div>
                <h3>Leger Form</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>

        <form action="assets/backend/ledgerForm.php" method="post">
            <div class="form-body">
                <input type="text" name="legerName" placeholder="Enter leger name">
                <div class="custom-select">
                    <select id="leger-type" name="legerType">
                        <option value="">Select leger type</option>
                        <option value="assets">Assets</option>
                        <option value="liability">Liability</option>
                        <option value="equity">Equity</option>
                    </select>
                </div>
            </div>

            <div class="form-footer">
                <button type="submit" id="addBtnLeger" class="add-btn">Create</button>
                <button type="button" id="closeBtnLeger" class="close-btn">Close</button>
            </div>
        </form>
    </div>

    <!-- Transaction Add Form -->
    <!-- <div id="transactionAddForm" class="form">
        <div class="form-header">
            <div>
                <h3>Transaction Form</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>
        <div class="form-body">
            <div class="body-inline-transactions">
                <div class="transactions-contets">
                    <div class="leger-names">
                        <div>
                            <label for="transaction-date">Transaction Date:</label>
                            <input type="text" id="dateInput" name="trans_date">
                        </div>
                        <label for="from-leger">From (Leger):</label>
                        <div class="custom-select">
                            <select id="fromLeger" name="trans_from">
                                <option value="">Select leger</option>
                                <option value="assets">Cash</option>
                                <option value="liability">Bank</option>
                                <option value="equity">Loan</option>
                            </select>
                        </div>
                        <label for="to-leger">To (Leger):</label>
                        <div class="custom-select">
                            <select id="toLeger" name="trans_to">
                                <option value="">Select leger</option>
                                <option value="assets">Cash</option>
                                <option value="liability">Bank</option>
                                <option value="equity">Loan</option>
                            </select>
                        </div>
                        <div>
                            <label for="amount">Amount:</label>
                            <input type="text" name="trans_amount">
                        </div>
                    </div>

                    <div class="transaction-right-content">
                        <div>
                            <label for="transaction-note">Note:</label>
                            <textarea name="trans_desc" placeholder="Enter note here..."></textarea>
                        </div>
                        <div>
                            <label for="transaction-document">Import Document (Optional)</label>
                            <input type="file" name="trans_attach[]" multiple>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <button id="addBtnTransaction" class="add-btn">Create</button>
            <button id="closeBtnTransaction" class="close-btn">Close</button>
        </div>
    </div> -->

    <div id="transactionAddForm" class="form">
        <div class="form-header">
            <div>
                <h3>Transaction Form</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>
        <form action="assets/backend/submit_transaction.php" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="body-inline-transactions">
                    <div class="transactions-contets">
                        <div class="leger-names">
                            <div>
                                <label for="transaction-date">Transaction Date:</label>
                                <input type="text" id="dateInput" name="trans_date">
                            </div>
                            <label for="from-leger">From (Leger):</label>
                            <div class="custom-select">
                                <select id="fromLeger" name="trans_from">
                                    <option value="">Select leger</option>
                                    <option value="assets">Cash</option>
                                    <option value="liability">Bank</option>
                                    <option value="equity">Loan</option>
                                </select>
                            </div>
                            <label for="to-leger">To (Leger):</label>
                            <div class="custom-select">
                                <select id="toLeger" name="trans_to">
                                    <option value="">Select leger</option>
                                    <option value="assets">Cash</option>
                                    <option value="liability">Bank</option>
                                    <option value="equity">Loan</option>
                                </select>
                            </div>
                            <div>
                                <label for="amount">Amount:</label>
                                <input type="text" name="trans_amount">
                            </div>
                        </div>

                        <div class="transaction-right-content">
                            <div>
                                <label for="transaction-note">Note:</label>
                                <textarea name="trans_desc" placeholder="Enter note here..."></textarea>
                            </div>
                            <div>
                                <label for="transaction-document">Import Document (Optional)</label>
                                <input type="file" name="trans_attach[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <!-- Add onclick event to the Create button -->
                <button id="addBtnTransaction" class="add-btn" onclick="submitForm()">Create</button>
                <button id="closeBtnTransaction" class="close-btn">Close</button>
            </div>
        </form>
    </div>



    <!-- <div id="transactionAddForm" class="form">
        <div class="form-header">
            <div>
                <h3>Transaction Form</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>
        <form id="transactionForm" action="process_transaction.php" method="post" enctype="multipart/form-data">
            <div class="form-body">
                <div class="body-inline-transactions">
                    <div class="transactions-contets">
                        <div class="leger-names">
                            <div>
                                <label for="transaction-date">Transaction Date:</label>
                                <input type="text" id="dateInput" name="trans_date">
                            </div>
                            <label for="from-leger">From (Leger):</label>
                            <div class="custom-select">
                                <select id="from-leger" name="trans_from">
                                    <option value="">Select leger</option>
                                    <option value="assets">Cash</option>
                                    <option value="liability">Bank</option>
                                    <option value="equity">Loan</option>
                                </select>
                            </div>
                            <label for="to-leger">To (Leger):</label>
                            <div class="custom-select">
                                <select id="to-leger" name="trans_to">
                                    <option value="">Select leger</option>
                                    <option value="assets">Cash</option>
                                    <option value="liability">Bank</option>
                                    <option value="equity">Loan</option>
                                </select>
                            </div>
                            <div>
                                <label for="amount">Amount:</label>
                                <input type="text" name="trans_amount">
                            </div>
                        </div>

                        <div class="transaction-right-content">
                            <div>
                                <label for="transaction-note">Note:</label>
                                <textarea name="trans_desc" placeholder="Enter note here..."></textarea>
                            </div>
                            <div>
                                <label for="transaction-document">Import Document (Optional)</label>
                                <input type="file" name="trans_attach[]" multiple>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-footer">
                <button type="submit" class="add-btn">Create</button>
                <button type="button" id="closeBtnTransaction" class="close-btn">Close</button>
            </div>
        </form>
    </div> -->


    <!-- =========== VIEW FORM =========  -->
    <!-- leger view -->
    <div id="legerViewForm" class="form">
        <div class="form-header">
            <div>
                <h3>Leger Account Details</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>
        <div class="form-body">
            <!-- Add your form content here -->
        </div>
        <div class="form-footer">
            <div class="report-tools">
                <div class="delete-button">
                    <button>
                        <ion-icon name="trash-outline"></ion-icon> Delete
                    </button>
                </div>
                <button>
                    <div>
                        <ion-icon name="document-text-outline"></ion-icon>
                    </div>
                    <div>
                        <p>Export to PDF</p>
                    </div>
                </button>
                <button class="button2">
                    <div>
                        <ion-icon name="print-outline"></ion-icon>
                    </div>
                    <div>
                        <p>Print</p>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <div id="transactionViewForm" class="form">
        <div class="form-header">
            <div>
                <h3>Transaction Details</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>
        <div class="form-body">
            <table border="1" style="margin-left: 20px; margin-right: 20px;">
                <thead>
                    <tr>
                        <th colspan="3" style="text-align: center;">Bank Deposite (Description)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 50%;">Date</td>
                        <td colspan="2" style="width: 50%;">2023/12/04</td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">Amount</td>
                        <td colspan="2" style="width: 50%;">$10000</td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">Document</td>
                        <td colspan="2" style="width: 50%;"><img src="assets/imgs/MRZD - LOGO.png" alt="" width="200px" height="100px"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-footer">
            <div class="report-tools">
                <div class="delete-button">
                    <button>
                        <ion-icon name="trash-outline"></ion-icon> Delete
                    </button>
                </div>
                <button>
                    <div>
                        <ion-icon name="document-text-outline"></ion-icon>
                    </div>
                    <div>
                        <p>Export to PDF</p>
                    </div>
                </button>
                <button class="button2">
                    <div>
                        <ion-icon name="print-outline"></ion-icon>
                    </div>
                    <div>
                        <p>Print</p>
                    </div>
                </button>
            </div>
        </div>
    </div>


    <!-- =========== POP UP ADD FORMS =========  -->
    <!-- Leger Edit Form -->
    <div id="legerEditForm" class="form">
        <div class="form-header">
            <div>
                <h3>Leger Edit</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>
        <div class="form-body">
            <input type="text" placeholder="Enter leger name">
            <div class="custom-select">
                <select id="leger-type">
                    <option value="">Select leger type</option>
                    <option value="assets">Assets</option>
                    <option value="liability">Liability</option>
                    <option value="equity">Equity</option>
                </select>
            </div>
        </div>
        <div class="form-footer">
            <button id="editBtnLeger" class="add-btn">Save</button>
        </div>
    </div>

    <!-- Transaction Edit Form -->
    <div id="transactionEditForm" class="form">
        <div class="form-header">
            <div>
                <h3>Transaction Edit</h3>
            </div>
            <div>
                <span class="close">&times;</span>
            </div>
        </div>
        <div class="form-body">
            <div class="body-inline-transactions">
                <div class="transactions-contets">
                    <div class="leger-names">
                        <div>
                            <label for="transaction-date">Transaction Date:</label>
                            <input type="date" id="dateInput">
                        </div>
                        <label for="from-leger">From (Leger):</label>
                        <div class="custom-select">
                            <select id="leger-names">
                                <option value="">Select leger</option>
                                <option value="assets">Cash</option>
                                <option value="liability">Bank</option>
                                <option value="equity">Loan</option>
                            </select>
                        </div>
                        <label for="to-leger">To (Leger):</label>
                        <div class="custom-select">
                            <select id="leger-names">
                                <option value="">Select leger</option>
                                <option value="assets">Cash</option>
                                <option value="liability">Bank</option>
                                <option value="equity">Loan</option>
                            </select>
                        </div>
                        <div>
                            <label for="amount">Amount:</label>
                            <input type="text">
                        </div>
                    </div>

                    <div class="transaction-right-content">
                        <div>
                            <label for="transaction-note">Note:</label>
                            <textarea placeholder="Enter note her..."></textarea>
                        </div>
                        <div>
                            <label for="tansaction-document">Import Document (Optional)</label>
                            <button class="fetch-button">
                                <div>
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div>
                                    <p>Import File</p>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-footer">
            <button id="editBtnTransaction" class="add-btn">Save</button>
        </div>
    </div>
    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        let profiledropdownlist = document.querySelector(".profile-dropdown-list");
        let btn = document.querySelector(".user-img");
        let profilePopup = document.getElementById("profilePopup");
        let logoutPopup = document.getElementById("logoutPopup");
        let DeletePopup = document.getElementById("DeletePopup");

        btn.addEventListener('click', () => {
            profiledropdownlist.classList.add('active');
        })

        const showProfilePopup = () => {
            // Show the profile popup
            profilePopup.style.display = "flex";

            // Update the profile information (replace these with actual data)
            document.getElementById("profileImage").src = "./assets/imgs/customer01.jpg";
            document.getElementById("profileName").innerText = "John Doe";
            document.getElementById("profileEmail").innerText = "john.doe@example.com";
            document.getElementById("profileRole").innerText = "Role: User";
        };

        const closeProfilePopup = () => {
            // Close the profile popup
            profilePopup.style.display = "none";
        };

        const confirmLogout = () => {
            // Show the logout confirmation popup
            logoutPopup.style.display = "flex";
        };

        const confirmDelete = () => {
            // Show the logout confirmation popup
            DeletePopup.style.display = "flex";
        };

        const logout = () => {
            // Perform logout action (you can replace this with your actual logout code)
            alert("Logout successful");
            // Close the logout confirmation popup
            logoutPopup.style.display = "none";
        };
        const Delete = () => {
            // Perform logout action (you can replace this with your actual logout code)
            alert("Delete successful");
            // Close the logout confirmation popup
            DeletePopup.style.display = "none";
        };

        const cancelLogout = () => {
            // Close the logout confirmation popup
            logoutPopup.style.display = "none";
        };
        const cancelDelete = () => {
            // Close the logout confirmation popup
            DeletePopup.style.display = "none";
        };



        window.addEventListener("click", function(e) {
            if (!btn.contains(e.target)) profiledropdownlist.classList.remove("active");
        })
    </script>


</body>

</html>