<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Super Admin - User Monitoring</title>
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

        /* ---- tabs (All Branches · All Roles · Filters) ---- */
        .nav-tabs-custom {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 28px;
            margin-bottom: 28px;
            border-bottom: 1px solid #e2e7f2;
            padding-bottom: 12px;
        }
        .nav-tabs-custom .tab-item {
            font-weight: 600;
            font-size: 16px;
            color: #4a5a8c;
            cursor: default;
            padding: 6px 0;
            position: relative;
            transition: 0.1s;
            letter-spacing: 0.2px;
        }
        .nav-tabs-custom .tab-item.active {
            color: var(--primary);
        }
        .nav-tabs-custom .tab-item.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -13px;
            width: 100%;
            height: 3px;
            background: var(--primary);
            border-radius: 4px;
        }
        .nav-tabs-custom .tab-item i {
            margin-right: 8px;
            font-size: 18px;
        }

        /* ---- table ---- */
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
        .table tbody tr.total-row td {
            background: #f0f3fc;
            font-weight: 700;
            color: var(--primary);
            border-top: 2px solid #d7def0;
        }
        .table tbody tr.total-row td:first-child {
            border-radius: 0 0 0 0;
        }
        .badge-count {
            display: inline-block;
            background: #e7ecfc;
            color: var(--primary);
            font-weight: 600;
            font-size: 13px;
            padding: 2px 14px;
            border-radius: 40px;
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
            .table-wrap {
                overflow-x: auto;
            }
            .nav-tabs-custom {
                gap: 4px 16px;
            }
            .nav-tabs-custom .tab-item {
                font-size: 14px;
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
            <li><a class="active" href="SuperAdmin_UserMonitoring.php"><i class="bi bi-box-seam"></i><span>User Monitoring</span></a></li>
            <li><a href="SuperAdmin_BranchPerformanceMonitoring.php"><i class="bi bi-graph-up-arrow"></i><span>Branch Performance Monitoring</span></a></li>
            <li><a href="SuperAdmin_Reports.php"><i class="bi bi-file-earmark-bar-graph-fill"></i><span>Reports</span></a></li>
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
        <h3>User Monitoring</h3>
        <div class="profile">SUPER ADMIN <i class="bi bi-caret-down-fill"></i></div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="content">

        <!-- Tabs: All Branches · All Roles · Filters -->
        <div class="nav-tabs-custom">
            <span class="tab-item active"><i class="bi bi-diagram-3"></i> All Branches</span>
            <span class="tab-item"><i class="bi bi-person-badge"></i> All Roles</span>
            <span class="tab-item"><i class="bi bi-funnel"></i> Filters</span>
        </div>

        <!-- Table -->
        <div class="table-wrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>Role</th>
                        <th class="text-center">Total Users</th>
                        <th class="text-center">Active</th>
                        <th class="text-center">Inactive</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Administrator</strong></td>
                        <td class="text-center">5</td>
                        <td class="text-center">5</td>
                        <td class="text-center">0</td>
                    </tr>
                    <tr>
                        <td><strong>Admin Staff</strong></td>
                        <td class="text-center">18</td>
                        <td class="text-center">17</td>
                        <td class="text-center">1</td>
                    </tr>
                    <tr>
                        <td><strong>Inventory Officer</strong></td>
                        <td class="text-center">12</td>
                        <td class="text-center">11</td>
                        <td class="text-center">1</td>
                    </tr>
                    <tr>
                        <td><strong>Nurse</strong></td>
                        <td class="text-center">68</td>
                        <td class="text-center">63</td>
                        <td class="text-center">5</td>
                    </tr>
                    <tr>
                        <td><strong>Others</strong></td>
                        <td class="text-center">83</td>
                        <td class="text-center">80</td>
                        <td class="text-center">3</td>
                    </tr>
                    <!-- TOTAL ROW -->
                    <tr class="total-row">
                        <td><strong>Total</strong></td>
                        <td class="text-center"><span class="badge-count">186</span></td>
                        <td class="text-center"><span class="badge-count">176</span></td>
                        <td class="text-center"><span class="badge-count">10</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div> <!-- /content -->
</div> <!-- /main -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>