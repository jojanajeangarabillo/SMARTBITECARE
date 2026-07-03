<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Nurse - Medical Supply Management</title>
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

        /* ---- section title ---- */
        .section-label {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 16px;
        }

        /* ---- filter tabs ---- */
        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 8px 20px;
            margin-bottom: 24px;
        }
        .filter-tabs .tab-item {
            font-weight: 600;
            font-size: 15px;
            color: #4a5a8c;
            cursor: default;
            padding: 6px 0;
            position: relative;
            transition: 0.1s;
            letter-spacing: 0.2px;
        }
        .filter-tabs .tab-item.active {
            color: var(--primary);
        }
        .filter-tabs .tab-item.active::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -3px;
            width: 100%;
            height: 3px;
            background: var(--primary);
            border-radius: 4px;
        }
        .filter-tabs .tab-item i {
            margin-right: 6px;
        }

        /* ---- quick actions ---- */
        .quick-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }
        .btn-quick {
            background: var(--card-bg);
            color: var(--primary);
            border: none;
            border-radius: 40px;
            padding: 8px 22px;
            font-weight: 600;
            font-size: 14px;
            transition: 0.15s;
        }
        .btn-quick:hover {
            background: #d7def0;
        }
        .btn-quick i {
            margin-right: 6px;
        }

        /* ---- view all supplies button ---- */
        .btn-view-all {
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 40px;
            padding: 10px 32px;
            font-weight: 600;
            transition: 0.15s;
            margin-bottom: 28px;
        }
        .btn-view-all:hover {
            background: #1d2863;
            color: #fff;
        }

        /* ---- expiring vaccines card ---- */
        .expiring-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
            padding: 22px 28px 26px;
        }
        .expiring-card .expiring-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 14px;
        }

        .expiring-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #edf1f8;
            flex-wrap: wrap;
            gap: 8px;
        }
        .expiring-item:last-child {
            border-bottom: none;
        }
        .expiring-item .item-name {
            font-weight: 600;
            color: var(--primary);
            font-size: 16px;
            min-width: 100px;
        }
        .expiring-item .item-qty {
            font-weight: 500;
            color: #1f2a4a;
        }
        .expiring-item .item-date {
            font-weight: 500;
            color: var(--accent);
            background: #fde8e8;
            padding: 2px 16px;
            border-radius: 30px;
            font-size: 14px;
        }
        .expiring-item .item-date.urgent {
            background: #fdd0d0;
        }

        .btn-view-expiring {
            background: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
            border-radius: 40px;
            padding: 8px 28px;
            font-weight: 600;
            transition: 0.15s;
            margin-top: 16px;
        }
        .btn-view-expiring:hover {
            background: var(--primary);
            color: #fff;
        }

        /* ---- responsive ---- */
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
            .filter-tabs {
                gap: 4px 14px;
            }
            .filter-tabs .tab-item {
                font-size: 13px;
            }
            .quick-actions {
                gap: 8px;
            }
            .btn-quick {
                font-size: 13px;
                padding: 6px 16px;
            }
            .expiring-card {
                padding: 16px;
            }
            .expiring-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 4px;
            }
            .btn-view-all {
                width: 100%;
                justify-content: center;
            }
            .btn-view-expiring {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<!-- ========== SIDEBAR (Nurse) ========== -->
<div class="sidebar">
    <div class="logo-area">
        <div class="logo-frame">
            <img src="logo.png" alt="Smart Bite Care Logo" class="logo" />
        </div>
        <div class="system-name">Smart Bite Care</div>
    </div>

    <nav class="nav-menu">
        <ul>
            <li><a href="Nurse_Dashboard.php"><i class="bi bi-grid-fill"></i><span>Dashboard</span></a></li>
            <li><a href="Nurse_Patients.php"><i class="bi bi-heart-pulse-fill"></i><span>Patients</span></a></li>
            <li><a class="active" href="Nurse_MedicalSuppliesManagement.php"><i class="bi bi-calendar-check"></i><span>Medical Supplies Management</span></a></li>
            <li><a href="Nurse_SupplyPrediction.php"><i class="bi bi-box-seam"></i><span>Supply Prediction</span></a></li>
            <li><a href="Nurse_Notification.php"><i class="bi bi-graph-up-arrow"></i><span>Notification</span></a></li>
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
        <h3>Medical Supply Management</h3>
        <div class="profile">NURSE <i class="bi bi-caret-down-fill"></i></div>
    </div>

    <!-- PAGE CONTENT -->
    <div class="content">


        <!-- Medical Supplies Section -->
        <div class="section-label">Medical Supplies</div>

        <!-- Filter Tabs -->
        <div class="filter-tabs">
            <span class="tab-item active"><i class="bi bi-grid-3x3-gap-fill"></i> All Supplies</span>
            <span class="tab-item"><i class="bi bi-syringe"></i> Syringes</span>
            <span class="tab-item"><i class="bi bi-capsule"></i> Vaccines</span>
            <span class="tab-item"><i class="bi bi-box"></i> Others</span>
            <span class="tab-item"><i class="bi bi-clock"></i> Expiring Soon</span>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <button class="btn-quick"><i class="bi bi-syringe"></i> Record Syringe Usage</button>
            <button class="btn-quick"><i class="bi bi-capsule"></i> Record Vaccine Usage</button>
            <button class="btn-quick"><i class="bi bi-clipboard2-check"></i> Record Daily Consumption</button>
            <button class="btn-quick"><i class="bi bi-box-arrow-up-right"></i> Request Restock</button>
            <button class="btn-quick"><i class="bi bi-clock-history"></i> View Usage History</button>
        </div>

        <!-- View All Supplies Button -->
        <button class="btn-view-all"><i class="bi bi-eye me-2"></i> View All Supplies</button>

        <!-- Expiring Vaccines -->
        <div class="expiring-card">
            <div class="expiring-title"><i class="bi bi-exclamation-triangle-fill me-2" style="color: var(--accent);"></i> Expiring Vaccines</div>

            <div class="expiring-item">
                <span class="item-name">SPEEDA</span>
                <span class="item-qty">5 vials</span>
                <span class="item-date">May 20, 2026</span>
            </div>
            <div class="expiring-item">
                <span class="item-name">ERIG</span>
                <span class="item-qty">2 vials</span>
                <span class="item-date">May 20, 2026</span>
            </div>
            <div class="expiring-item">
                <span class="item-name">BETT</span>
                <span class="item-qty">3 vials</span>
                <span class="item-date">May 20, 2026</span>
            </div>

            <button class="btn-view-expiring"><i class="bi bi-eye me-2"></i> View All Expiring</button>
        </div>

    </div> <!-- /content -->
</div> <!-- /main -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>