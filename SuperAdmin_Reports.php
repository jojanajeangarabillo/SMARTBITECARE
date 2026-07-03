<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Super Admin - Reports</title>
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!-- Reusable Sidebar CSS (simulated) -->
    <link rel="stylesheet" href="sidebar.css" />
    <style>
        /* =========================================
           INTERNAL CSS – matches image style
           ========================================= */
        :root {
            --primary: #2B3A8C;
            --accent: #F21D2F;
            --bg: #F2F2F2;
            --card-bg: #ECEEF7;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: white;
            font-family: 'Segoe UI', Roboto, system-ui, sans-serif;
            margin: 0;
            padding: 0;
        }


        /* ---- main content ---- */
        .main {
            margin-left: 260px;
            min-height: 100vh;
            background: #f9faff;
        }

        .topbar {
            background: white;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
            border-bottom: 1px solid #e9edf5;
        }
        .topbar h3 {
            font-size: 28px;
            font-weight: 700;
            color: var(--primary);
            margin: 0;
            letter-spacing: -0.3px;
        }
        .profile {
            font-weight: 600;
            color: var(--primary);
            cursor: default;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .content {
            padding: 35px 35px 40px;
        }

        /* ---- page header ---- */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }
        .page-header h2 {
            font-size: 26px;
            font-weight: 700;
            color: var(--primary);
            margin: 0;
        }
        .page-header .badge-role {
            background: var(--primary);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            padding: 6px 16px;
            border-radius: 30px;
            letter-spacing: 0.3px;
            margin-left: 12px;
        }

        /* ---- report generator card ---- */
        .report-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            padding: 28px 30px 30px;
            margin-bottom: 28px;
        }
        .report-card .section-label {
            font-weight: 600;
            color: var(--primary);
            font-size: 15px;
            margin-bottom: 6px;
        }
        .report-card .section-value {
            font-weight: 500;
            color: #1f2a4a;
            font-size: 16px;
            padding: 8px 16px;
            background: #f0f3fc;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 0;
        }
        .report-card .form-select-custom {
            border: 1px solid #d0d7e8;
            border-radius: 10px;
            padding: 10px 16px;
            font-weight: 500;
            color: #1f2a4a;
            background: white;
            width: 100%;
            max-width: 280px;
            outline: none;
            transition: 0.15s;
        }
        .report-card .form-select-custom:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(43, 58, 140, 0.15);
        }
        .report-card .date-input {
            border: 1px solid #d0d7e8;
            border-radius: 10px;
            padding: 10px 16px;
            font-weight: 500;
            color: #1f2a4a;
            background: white;
            outline: none;
            transition: 0.15s;
            width: 160px;
        }
        .report-card .date-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(43, 58, 140, 0.15);
        }
        .btn-generate {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 40px;
            padding: 12px 36px;
            font-weight: 600;
            transition: 0.15s;
            white-space: nowrap;
        }
        .btn-generate:hover {
            background: #1d2863;
            color: #fff;
        }
        .report-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 20px 40px;
        }
        .report-row .field-group {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }
        .report-row .field-group label {
            font-weight: 600;
            color: var(--primary);
            font-size: 14px;
            letter-spacing: 0.2px;
        }
        .report-row .field-group .value-display {
            font-weight: 500;
            color: #1f2a4a;
            font-size: 16px;
            padding: 8px 16px;
            background: #f0f3fc;
            border-radius: 10px;
            display: inline-block;
        }
        .date-range-group {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }
        .date-range-group span {
            font-weight: 500;
            color: #4a5a8c;
        }

        /* ---- report list table ---- */
        .table-wrap {
            background: white;
            border-radius: 18px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            padding: 6px 0 6px 0;
        }
        .table {
            margin-bottom: 0;
            border-collapse: separate;
            border-spacing: 0;
        }
        .table thead th {
            background: #f0f3fc;
            color: var(--primary);
            font-weight: 700;
            font-size: 15px;
            padding: 16px 20px;
            border-bottom: 1px solid #e2e7f2;
            letter-spacing: 0.3px;
        }
        .table tbody td {
            padding: 16px 20px;
            vertical-align: middle;
            border-bottom: 1px solid #edf1f8;
            color: #1f2a4a;
            font-weight: 500;
        }
        .table tbody tr:last-child td {
            border-bottom: none;
        }
        .action-icons i {
            font-size: 20px;
            color: var(--primary);
            margin-right: 14px;
            cursor: default;
            opacity: 0.7;
            transition: 0.1s;
        }
        .action-icons i:hover {
            opacity: 1;
        }
        .action-icons i:last-child {
            margin-right: 0;
        }
        .report-name {
            font-weight: 600;
            color: var(--primary);
        }

        /* responsive */
        @media (max-width: 991px) {
            .main {
                margin-left: 90px;
            }
            .sidebar {
                width: 90px;
                padding: 16px 10px;
            }
            .system-name,
            .nav-menu span,
            .logout span {
                display: none;
            }
            .logo-area {
                justify-content: center;
            }
            .nav-menu a {
                justify-content: center;
                padding: 12px 8px;
            }
            .nav-menu a i {
                font-size: 26px;
                margin: 0;
            }
            .logout a {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .topbar {
                padding: 0 16px;
                height: 70px;
            }
            .content {
                padding: 20px 16px;
            }
            .page-header h2 {
                font-size: 22px;
            }
            .report-card {
                padding: 18px;
            }
            .report-row {
                flex-direction: column;
                align-items: stretch;
                gap: 14px;
            }
            .report-row .field-group {
                width: 100%;
            }
            .report-card .form-select-custom {
                max-width: 100%;
            }
            .date-range-group {
                flex-wrap: wrap;
            }
            .date-range-group .date-input {
                width: 100%;
            }
            .btn-generate {
                width: 100%;
                justify-content: center;
            }
            .table-wrap {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>

<!-- ========== SIDEBAR (Super Admin) ========== -->
<div class="sidebar">
    <div class="logo-area">
        <div class="logo-frame">
            <img src="logo.png" alt="Smart Bite Care Logo" class="logo" />
        </div>
        <div class="system-name">Smart Bite Care</div>
    </div>

    <nav class="nav-menu">
        <ul>
            <li><a href="SuperAdmin_Dashboard.php"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a></li>
            <li><a href="SuperAdmin_BranchManagement.php"><i class="bi bi-people-fill"></i><span>Branch Management</span></a></li>
            <li><a href="SuperAdmin_BranchAdminManagement.php"><i class="bi bi-heart-pulse-fill"></i><span>Branch Admin Management</span></a></li>
            <li><a href="SuperAdmin_UserMonitoring.php"><i class="bi bi-box-seam"></i><span>User Monitoring</span></a></li>
            <li><a href="SuperAdmin_BranchPerformanceMonitoring.php"><i class="bi bi-graph-up-arrow"></i><span>Branch Performance Monitoring</span></a></li>
            <li><a class="active" href="SuperAdmin_Reports.php"><i class="bi bi-file-earmark-bar-graph-fill"></i><span>Reports</span></a></li>
            <li><a href="SuperAdmin_AuditLogs.php"><i class="bi bi-clock-history"></i><span>Audit Logs</span></a></li>
            <li><a href="SuperAdmin_Notifications.php"><i class="bi bi-bell-fill"></i><span>Notifications</span></a></li>
        </ul>
    </nav>

    <div class="logout">
        <a href="#"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a>
    </div>
</div>

<!-- ========== MAIN CONTENT ========== -->
<div class="main">

    <!-- TOP BAR -->
    <div class="topbar">
        <h3>Reports</h3>
        <div class="profile">SUPER ADMIN <i class="bi bi-caret-down-fill"></i></div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="content">

        <!-- Report Generator Card -->
        <div class="report-card">
            <div class="report-row">
                <!-- Select Report Type -->
                <div class="field-group">
                    <label>Select Report Type</label>
                    <select class="form-select-custom">
                        <option selected>Patient Report</option>
                        <option>Branch Report</option>
                        <option>Case Report</option>
                        <option>Vaccination Report</option>
                        <option>Inventory Report</option>
                        <option>Prediction Report</option>
                        <option>User Report</option>
                    </select>
                </div>

                <!-- Date Range -->
                <div class="field-group">
                    <label>Date Range</label>
                    <div class="date-range-group">
                        <input type="text" class="date-input" value="05/01/2025" />
                        <span>—</span>
                        <input type="text" class="date-input" value="05/15/2025" />
                    </div>
                </div>

                <!-- Generate Button -->
                <div class="field-group" style="justify-content: flex-end; flex: 1;">
                    <button class="btn-generate"><i class="bi bi-file-earmark-arrow-down me-2"></i> Generate Report</button>
                </div>
            </div>
        </div>

        <!-- Report List Table -->
        <div class="table-wrap">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Report Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="report-name">Branch Report</td>
                        <td class="action-icons">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-download"></i>
                            <i class="bi bi-printer"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="report-name">Patient Report</td>
                        <td class="action-icons">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-download"></i>
                            <i class="bi bi-printer"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="report-name">Case Report</td>
                        <td class="action-icons">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-download"></i>
                            <i class="bi bi-printer"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="report-name">Vaccination Report</td>
                        <td class="action-icons">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-download"></i>
                            <i class="bi bi-printer"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="report-name">Inventory Report</td>
                        <td class="action-icons">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-download"></i>
                            <i class="bi bi-printer"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="report-name">Prediction Report</td>
                        <td class="action-icons">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-download"></i>
                            <i class="bi bi-printer"></i>
                        </td>
                    </tr>
                    <tr>
                        <td class="report-name">User Report</td>
                        <td class="action-icons">
                            <i class="bi bi-eye"></i>
                            <i class="bi bi-download"></i>
                            <i class="bi bi-printer"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div> <!-- /content -->
</div> <!-- /main -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>