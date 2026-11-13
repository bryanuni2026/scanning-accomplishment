<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Accomplishment </title>

<style>
*{box-sizing:border-box}

body{
    margin:0;
    padding:25px;
    font-family:Arial,sans-serif;
    background:
        linear-gradient(rgba(0,0,0,.35),rgba(0,0,0,.35)),
        url("bg3.jpg") center/cover fixed;
    color:black;
}

/* NIGHT MODE */
body.dark-mode .print-modal {
    background: rgba(0, 0, 0, .72);
}

body.dark-mode .print-modal-content {
    background: #111827;
    color: rgb(255, 255, 255);
    box-shadow: 0 20px 50px rgba(0, 0, 0, .55);
}


.container {
    max-width: 1250px;
    margin: auto;

    background: rgba(224, 215, 236, 0.65);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    padding: 28px;

    border-radius: 14px;

    border: 1px solid rgba(255, 255, 255, 0.25);

    box-shadow:
        0 5px 25px rgba(0, 0, 0, 0.2);
}

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding-bottom:15px;
    border-bottom:1px solid #ddd;
}

.user-area{
    display:flex;
    gap:8px;
}

.user-area a{
    color:white;
    text-decoration:none;
    padding:9px 14px;
    border-radius:6px;
    font-size:13px;
}

.profile-btn{background:#2563eb}
.logout-btn{background:#dc2626}

h1{text-align:center;margin:20px 0 5px}
.subtitle{text-align:center;color:black;margin-bottom:28px}

.form-grid{
    display:grid;
    grid-template-columns:1.3fr 1.2fr 1.3fr 1fr auto;
    gap:14px;
    align-items:end;
}

.form-group{
    display:flex;
    flex-direction:column;
}

label{
    font-weight:bold;
    margin-bottom:7px;
    font-size:14px;
}

select,input,textarea{
    width:100%;
    padding:11px;
    border:1px solid #fafafa;
    border-radius:6px;
    font-size:14px;
    color: black;
}

textarea{
    min-height:44px;
    height:44px;
    resize:vertical;
    font-family:Arial,sans-serif;
    
}

#detailsGroup,
#editDetailsGroup{
    min-width:0;
}

#detailsGroup textarea,
#editDetailsGroup textarea{
    width:100%;
    min-height:44px;
    height:44px;
    resize:vertical;
}

.finish-btn{
    height:42px;
    border:0;
    border-radius:6px;
    background:#2563eb;
    color:#fff;
    padding:0 17px;
    cursor:pointer;
    font-weight:bold;
}

.location-wrapper{
    overflow-x:auto;
    margin:15px 0 28px;
}

.location-table{
    width:100%;
    border-collapse:collapse;
}

.location-table th{
    background:#1e293b;
    color:white;
    padding:13px 9px;
    border:1px solid black;
    cursor:pointer;
    white-space:nowrap;
    font-size:12px;
}

.location-table th:hover,
.location-table th.selected{
    background:#16a34a;
}

.summary{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:15px;
    margin-bottom:28px;
}

.summary-card{
    background:#f1f5f9;
    padding:18px;
    text-align:center;
    border-radius:8px;
}

.summary-card h3{
    margin:0 0 7px;
    font-size:14px;
    color:#64748b;
}

.summary-card p{
    margin:0;
    font-size:28px;
    font-weight:bold;
    color:#2563eb;
}

.record-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
    margin-bottom:15px;
}

.record-header h2{margin:0}

.record-actions{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.record-actions button{
    border:0;
    color:white;
    padding:9px 12px;
    border-radius:6px;
    cursor:pointer;
    font-weight:bold;
}

.print-btn{background:#7c3aed}
.export-btn{background:#16a34a}
.clear-btn{background:#dc2626}

.search-box{margin-bottom:15px}
.search-box input{max-width:520px}

.table-wrapper{overflow-x:auto}

.record-table{
    width:100%;
    border-collapse:collapse;
}

.record-table th{
    background:#1e293b;
    color:white;
    padding:12px;
    text-align:left;
    white-space:nowrap;
}

.record-table td{
    border-bottom:1px solid #e5e7eb;
    padding:12px;
    vertical-align:top;
}

.empty{
    text-align:center;
    color:#6b7280;
    padding:30px!important;
}

.edit-btn,.delete-btn{
    border:0;
    color:white;
    padding:7px 10px;
    border-radius:5px;
    cursor:pointer;
    margin-right:5px;
    white-space:nowrap;
    display:inline-block;
}

.edit-btn{background:#f59e0b}
.delete-btn{background:#dc2626}

.record-table td:last-child{
    white-space:nowrap;
    width:150px;
    min-width:150px;
}
.delete-btn{background:#dc2626}

.pagination{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:6px;
    margin-top:20px;
    flex-wrap:wrap;
}

.pagination button{
    border:1px solid #cbd5e1;
    background:white;
    padding:8px 12px;
    border-radius:6px;
    cursor:pointer;
}

.pagination button.active{
    background:#2563eb;
    color:white;
}

.pagination button:disabled{
    opacity:.45;
    cursor:not-allowed;
}

.modal{
    display:none;
    position:fixed;
    z-index:9999;
    inset:0;
    background:rgba(0,0,0,.55);
    justify-content:center;
    align-items:center;
    padding:20px;
}

.modal-content{
    background:rgba(252, 244, 244, 0.85);
    width:100%;
    max-width:550px;
    max-height:90vh;
    overflow:auto;
    padding:25px;
    border-radius:12px;
}


.location-manage-btn{
    background:#2563eb;color:#fff;border:0;border-radius:6px;
    padding:9px 14px;cursor:pointer;font-weight:bold;margin:0 0 12px 10px;
}
.location-manager-list{display:grid;gap:10px;margin-top:16px}
.location-manager-row{display:flex;gap:8px;align-items:center}
.location-manager-row input{flex:1;min-width:0;padding:9px;border:1px solid #cbd5e1;border-radius:6px}
.location-manager-row button{border:0;border-radius:6px;padding:9px 11px;color:white;cursor:pointer}
.location-rename-btn{background:#16a34a}
.location-delete-btn{background:#dc2626}
.location-add-row{display:flex;gap:8px;margin-top:12px}
.location-add-row input{flex:1;min-width:0;padding:10px;border:1px solid #cbd5e1;border-radius:6px}
.location-add-row button{background:#2563eb;color:white;border:0;border-radius:6px;padding:10px 14px;cursor:pointer}
.location-note{font-size:12px;color:#475569;margin-top:8px}
.location-table th{cursor:pointer}
.location-groups{display:grid;grid-template-columns:repeat(auto-fit,minmax(210px,1fr));gap:12px;width:100%}
.location-group{border:1px solid #cbd5e1;border-radius:9px;overflow:hidden;background:#fff;min-width:0}
.location-group-title{width:100%;border:0;background:#1e293b;color:#fff;padding:13px 12px;text-align:left;font-weight:700;cursor:pointer;display:flex;justify-content:space-between;gap:8px}
.location-group-title:hover,.location-group-title.active{background:#2563eb}
.location-group-options{display:none;padding:9px;gap:7px;grid-template-columns:repeat(2,minmax(0,1fr))}
.location-group-options.open{display:grid}
.location-option{border:1px solid #cbd5e1;background:#f8fafc;color:#0f172a;border-radius:6px;padding:8px 10px;cursor:pointer;font-size:12px}
.location-option:hover,.location-option.selected{background:#16a34a;color:#fff;border-color:#16a34a}
.location-group-count{font-size:11px;opacity:.8;font-weight:400}


.edit-form{
    display:grid;
    gap:15px;
}

.edit-buttons{
    display:flex;
    justify-content:flex-end;
    gap:10px;
}

.edit-buttons button{
    border:0;
    color:white;
    padding:10px 15px;
    border-radius:6px;
    cursor:pointer;
    font-weight:bold;
}

.save-edit-btn{background:#16a34a}
.cancel-edit-btn{background:#64748b}


.print-modal {
    display: none;
    position: fixed;
    z-index: 10001;
    inset: 0;
    background: rgba(0, 0, 0, .55);
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.print-modal-content {
    background: #ffffff;
    color: #111827;
    width: 100%;
    max-width: 480px;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, .25);
}

.print-options{
    display:grid;
    gap:12px;
    margin-top:15px;
}

.print-option{
    display:flex;
    align-items:center;
    gap:8px;
    font-weight:normal;
    margin:0;
}

.print-option input{
    width:auto;
}

.print-date-fields{
    display:grid;
    gap:12px;
    margin-top:10px;
}

.print-buttons{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:20px;
}

.print-buttons button{
    border:0;
    color:white;
    padding:10px 15px;
    border-radius:6px;
    cursor:pointer;
    font-weight:bold;
}

.print-cancel{background:#64748b}
.print-start{background:#7c3aed}

.password-modal{
    display:none;
    position:fixed;
    z-index:10000;
    inset:0;
    background:rgba(0,0,0,.55);
    justify-content:center;
    align-items:center;
    padding:20px;
}

.password-modal-content{
    background:white;
    width:100%;
    max-width:430px;
    padding:25px;
    border-radius:12px;
}

.password-buttons{
    display:flex;
    justify-content:flex-end;
    gap:10px;
    margin-top:20px;
}

.password-buttons button{
    border:0;
    color:white;
    padding:10px 15px;
    border-radius:6px;
    cursor:pointer;
    font-weight:bold;
}

.password-cancel{background:#64748b}
.password-continue{background:#dc2626}

@media(max-width:950px){
    body{padding:10px}
    .container{padding:15px}
    .form-grid,.summary{grid-template-columns:1fr}
    .topbar,.record-header{flex-direction:column;align-items:stretch}
    .user-area{flex-direction:column}
    .user-area a{text-align:center}
}


/* DARK MODE */
body.dark-mode{
    background:
        linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),
        url("Demon Slayer GIF.gif") center/cover fixed;
    color:#e5e7eb;
}


body.dark-mode .container{
    max-width: 1250px;
    margin: auto;

    background: rgba(30, 30, 31, 0.65);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    padding: 28px;

    border-radius: 14px;

    border: 1px solid rgba(255, 255, 255, 0.25);

    box-shadow:
        0 5px 25px rgba(0, 0, 0, 0.2);
}

body.dark-mode .topbar{
    border-bottom-color:#374151;
}

body.dark-mode h1,
body.dark-mode h2,
body.dark-mode h3,
body.dark-mode label{
    color:#f3f4f6;
}

body.dark-mode .subtitle{
    color:white;
}

body.dark-mode select,
body.dark-mode input,
body.dark-mode textarea{
    background:#1f2937;
    color:#f3f4f6;
    border-color:#4b5563;
}

body.dark-mode select option{
    background:#1f2937;
    color:#f3f4f6;
}
body.dark-mode .summary-card p{
    background:#1f2937;
    color:#f3f4f6;
}
body.dark-mode .summary-card{
    background:#1f2937;
}

body.dark-mode .summary-card h3{
    color:White;
}

body.dark-mode .record-table td{
    color:#e5e7eb;
    border-bottom-color:#374151;
}

body.dark-mode .pagination button{
    background:#1f2937;
    color:#e5e7eb;
    border-color:#4b5563;
}

body.dark-mode .pagination button.active{
    background:#2563eb;
    color:white;
}

body.dark-mode .modal-content,
body.dark-mode .password-modal-content{
    background:#111827;
    color:#e5e7eb;
}

body.dark-mode .search-box input{
    background:#1f2937;
    color:#f3f4f6;
}

.theme-btn{
    border:0;
    color:white;
    background:#374151;
    padding:9px 14px;
    border-radius:6px;
    cursor:pointer;
    font-size:13px;
    font-weight:bold;
}

.theme-btn:hover{
    background:#4b5563;
}

@media print{
    table th,
    table td,
    h1,
    h2,
    h3,
    p,
    label,
    span {
        color: #000000 !important;
    }
    @page{size:landscape;margin:12mm}

    body{
        padding:0;
        background:white!important;
    }

    .container{
        max-width:none;
        padding:0;
        box-shadow:none;
        background:white;
    }

    .topbar,
    .form-grid,
    .location-wrapper,
    .record-actions,
    .search-box,
    .pagination,
    .modal,
    .password-modal,
    .edit-btn,
    .delete-btn{
        display:none!important;
    }

    .summary{
        grid-template-columns:repeat(3,1fr);
    }

    .record-table{
        font-size:10px;
    }

    .record-table th{
        background:#e5e7eb!important;
        color:black!important;
        border:1px solid #999;
    }

    .record-table td{
        border:1px solid #ccc;
    }

    .record-table th:last-child,
    .record-table td:last-child{
        display:none;
    }
}
</style>
</head>

<body>

<div class="container">

<div class="topbar">
    <div>
        👤 Welcome,
        <strong><?= htmlspecialchars($_SESSION["full_name"] ?? "User") ?></strong>
    </div>

    <div class="user-area">
        <button id="themeToggle" class="theme-btn" onclick="toggleDarkMode()">
            🌙 Dark Mode
        </button>
        <a href="profile.php" class="profile-btn">👤 Profile</a>
        <a href="logout.php" class="logout-btn">🚪 Logout</a>
    </div>
</div>

<h1>AMS </h1>
<p class="subtitle">Local Document Scanning and Task Accomplishment System</p>

<div class="form-grid">

    <div class="form-group">
        <label>Location / Category</label>

        <select id="location" onchange="updateOtherLocationField()">
            <option value="">-- Select Location --</option>
            <option value="Others">Others</option>
        </select>

        <input
            id="otherLocation"
            type="text"
            placeholder="Enter other location/category"
            style="display:none;margin-top:8px"
        >
    </div>

    <div class="form-group">
        <label>Task Type</label>

        <select id="taskType" onchange="updateTaskFields()">
            <option>Document Scanned</option>
            <option>Delivery</option>
            <option>Computer Troubleshooting</option>
            <option>Other Related Task</option>
        </select>
    </div>

    <div class="form-group" id="documentsGroup">
        <label id="documentsLabel">Number of Documents Scanned</label>
        <input
            id="documents"
            type="number"
            min="1"
            step="1"
            placeholder="Enter number"
        >
    </div>

    <div class="form-group" id="detailsGroup" style="display:none">
        <label>Task Details</label>
        <textarea
            id="taskDetails"
            placeholder="Describe the task"
        ></textarea>
    </div>

    <div class="form-group">
        <label>File Date</label>
        <input id="fileDate" type="date">
    </div>

    <button class="finish-btn" onclick="finishTask()">
        ✓ Finish Task
    </button>

</div>

<!-- <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:8px">
    <h3>Locations</h3>
    <button type="button" class="location-manage-btn" onclick="openLocationManager()">⚙ Manage Locations</button>
</div>
-->
<div class="location-wrapper">
    <div id="locationSummaryBody" class="location-groups">Loading locations...</div>
</div>

<div class="summary">
    <div class="summary-card">
        <h3>Total Accomplishments</h3>
        <p id="totalEntries">0</p>
    </div>

    <div class="summary-card">
        <h3>Total Documents Scanned</h3>
        <p id="totalDocuments">0</p>
    </div>

    <div class="summary-card">
        <h3>Total Deliveries</h3>
        <p id="totalDeliveries">0</p>
    </div>

    <div class="summary-card">
        <h3>Total Computer Troubleshooting</h3>
        <p id="totalTroubleshooting">0</p>
    </div>

    <div class="summary-card">
        <h3>Total Other Related Tasks</h3>
        <p id="totalOtherTasks">0</p>
    </div>

    <div class="summary-card">
        <h3>Locations Completed</h3>
        <p id="locationsCompleted">0</p>
    </div>
</div>

<div class="record-header">
    <h2>Accomplishment Records</h2>

    <div class="record-actions">
        <button class="print-btn" onclick="openPrintModal()">
            🖨️ Print / Save as PDF
        </button>

        <button class="export-btn" onclick="exportCSV()">
            📊 Export CSV
        </button>

        <button class="clear-btn" onclick="clearDatabase()">
            🗑️ Clear All
        </button>
    </div>
</div>

<div class="search-box">
    <input
        id="search"
        type="text"
        placeholder="Search location..."
        oninput="searchRecords()"
    >
</div>

<div class="table-wrapper">
<table class="record-table">
<thead>
<tr>
    <th></th>
    <th>Location</th>
    <th>Task Type</th>
    <th>Details / Documents</th>
    <th>File Date</th>
    <th>Date Scanned</th>
    <th>Action</th>
</tr>
</thead>

<tbody id="recordBody">
<tr>
    <td colspan="7" class="empty">Loading records...</td>
</tr>
</tbody>
</table>
</div>

<div id="pagination" class="pagination"></div>

</div>

<!-- LOCATION MANAGER MODAL -->
<div id="locationManagerModal" class="modal">
  <div class="modal-content">
    <h2>⚙ Manage Locations</h2>
    <p class="location-note">Add, rename, or delete locations. Renaming updates existing accomplishment records. A location currently used by records cannot be deleted.</p>
    <div class="location-add-row">
      <input type="text" id="newLocationName" maxlength="100" placeholder="Enter new location name">
      <button type="button" onclick="addLocation()">＋ Add</button>
    </div>
    <div id="locationManagerList" class="location-manager-list">Loading locations...</div>
    <div class="edit-buttons" style="margin-top:18px">
      <button type="button" class="cancel-edit-btn" onclick="closeLocationManager()">Close</button>
    </div>
  </div>
</div>

<!-- EDIT MODAL -->

<div id="editModal" class="modal">

<div class="modal-content">

<h2>✏️ Edit Record</h2>

<div class="edit-form">

<input type="hidden" id="editId">

<div class="form-group">

<label>Location / Category</label>

<select id="editLocation" onchange="updateEditOtherLocationField()">
    <option value="">-- Select Location --</option>
    <option value="Others">Others</option>
</select>

<input
    id="editOtherLocation"
    type="text"
    placeholder="Enter other location/category"
    style="display:none;margin-top:8px"
>

</div>

<div class="form-group">

<label>Task Type</label>

<select id="editTaskType" onchange="updateEditTaskFields()">
    <option>Document Scanned</option>
    <option>Delivery</option>
    <option>Computer Troubleshooting</option>
    <option>Other Related Task</option>
</select>

</div>

<div class="form-group" id="editDocumentsGroup">

<label id="editDocumentsLabel">Number of Documents Scanned</label>

<input
    id="editDocuments"
    type="number"
    min="1"
    step="1"
>

</div>

<div class="form-group" id="editDetailsGroup" style="display:none">

<label>Task Details</label>

<textarea id="editTaskDetails"></textarea>

</div>

<div class="form-group">

<label>File Date</label>

<input id="editFileDate" type="date">

</div>

<div class="form-group">

<label>Date Scanned</label>

<input id="editFinishedAt" type="datetime-local">

</div>

<div class="edit-buttons">

<button
    class="cancel-edit-btn"
    onclick="closeEditModal()"
>
Cancel
</button>

<button
    class="save-edit-btn"
    onclick="saveEdit()"
>
✓ Save Changes
</button>

</div>

</div>
</div>
</div>

<!-- PRINT / SAVE AS PDF MODAL -->

<div id="printModal" class="print-modal">

    <div class="print-modal-content">

        <h2>🖨️ Print / Save as PDF</h2>

        <p>Select the Date Scanned range you want to print or save as PDF.</p>

        <div id="printCustomFields" class="print-date-fields" style="display:flex">
            <div class="form-group">
                <label>From Date Scanned</label>
                <input id="printFromDate" type="date">
            </div>

            <div class="form-group">
                <label>To Date Scanned</label>
                <input id="printToDate" type="date">
            </div>
        </div>

        <div class="print-buttons">
            <button class="print-cancel" onclick="closePrintModal()">
                Cancel
            </button>

            <button class="print-start" onclick="startPrint()">
                🖨️ Continue to Print
            </button>
        </div>

    </div>

</div>

<!-- CLEAR PASSWORD MODAL -->

<div id="passwordModal" class="password-modal">

<div class="password-modal-content">

<h2>🔐 Clear All Records</h2>

<p>
Enter your password to continue.
All accomplishment records will be permanently deleted.
</p>

<div class="form-group">

<label>Password</label>

<input
    id="clearPassword"
    type="password"
    autocomplete="current-password"
>

</div>

<div class="password-buttons">

<button
    class="password-cancel"
    onclick="closePasswordModal()"
>
Cancel
</button>

<button
    class="password-continue"
    onclick="submitClearPassword()"
>
Continue
</button>

</div>

</div>
</div>

<script>
const perPage = 10;

let allRecords = [];
let currentPage = 1;
let printingPage = 1;

const LOCATION_GROUPS = [
    {name:"LBP - GF", options:["LBP - GF PROPER","LBP - GF PROPER NEW","LBP - GF PROPER OLD"]},
    {name:"LBP - TF", options:["LBP TF COAFC NEW","LBP TF COAFC OLD","LBP TF LDRRMF NEW","LBP TF LDRRMF OLD","LBP TF PROPER NEW","LBP TF PROPER OLD"]},
    {name:"DBP - GF", options:["DBP - GF PROPER","DBP - GF PROPER NEW","DBP - GF PROPER OLD"]},
    {name:"DBP 20%", options:["DBP 20% NEW","DBP 20% OLD"]},
    {name:"DBP TINUY-AN", options:["DBP TINUY-AN OLD","DBP TINUY-AN NEW"]},
    {name:"DBP SEF", options:["DBP SEF NEW","DBP SEF OLD"]},
    {name:"DBP MARKET", options:["DBP MARKET NEW","DBP MARKET OLD"]},
    {name:"DBP CEMETERY", options:["DBP CEMETERY NEW","DBP CEMETERY OLD"]},
    {name:"DBP S-HOUSE", options:["DBP S-HOUSE NEW","DBP S-HOUSE OLD"]},
    {name:"DBP IJT", options:["DBP IJT NEW","DBP IJT OLD"]},
    {name:"DBP - TF", options:["DBP TF BCCSC NEW","DBP TF BCCSC OLD"]}
];

let databaseLocations = [];
let standardLocations = [];
let otherLocations = [];

async function loadLocations() {
    try {
        const response = await fetch("get_locations.php", {cache: "no-store"});
        const result = await response.json();
        if (!result.success) throw new Error(result.message || "Unable to load locations.");
        databaseLocations = (result.locations || []).map(item => item.name);
        const predefined = LOCATION_GROUPS.flatMap(group => group.options);
        otherLocations = databaseLocations.filter(name => !predefined.includes(name));
        // Only the predefined grouped locations are selectable directly.
        // Custom locations remain record values and are entered through OTHER.
        standardLocations = [...new Set(predefined)];
        populateLocationSelects();
        renderLocationSummary();
        return true;
    } catch (error) {
        console.error(error);
        alert("Unable to load locations. Please check get_locations.php and the locations table.");
        return false;
    }
}

function populateLocationSelects() {
    ["location", "editLocation"].forEach(id => {
        const select = document.getElementById(id);
        if (!select) return;
        const previous = select.value;
        select.innerHTML = '<option value="">-- Select Location --</option>';

        LOCATION_GROUPS.forEach(group => {
            const optgroup = document.createElement("optgroup");
            optgroup.label = group.name;
            group.options.forEach(name => {
                const option = document.createElement("option");
                option.value = name;
                option.textContent = name;
                optgroup.appendChild(option);
            });
            select.appendChild(optgroup);
        });

        const other = document.createElement("option");
        other.value = "Others";
        other.textContent = "OTHER";
        select.appendChild(other);

        if ([...select.options].some(option => option.value === previous)) {
            select.value = previous;
        }
    });
}

function renderLocationSummary() {
    const body = document.getElementById("locationSummaryBody");
    if (!body) return;
    body.innerHTML = "";

    const wrapper = document.createElement("div");
    wrapper.className = "location-groups";

    LOCATION_GROUPS.forEach(group => {
        const card = document.createElement("section");
        card.className = "location-group";

        const title = document.createElement("button");
        title.type = "button";
        title.className = "location-group-title";
        title.innerHTML = `<span>${escapeHTML(group.name)}</span><span class="location-group-count">${group.options.length} options ▾</span>`;

        const options = document.createElement("div");
        options.className = "location-group-options";

        group.options.forEach(name => {
            const button = document.createElement("button");
            button.type = "button";
            button.className = "location-option";
            button.textContent = name;
            button.addEventListener("click", () => selectLocation(name, button));
            options.appendChild(button);
        });

        title.addEventListener("click", () => {
            const willOpen = !options.classList.contains("open");
            document.querySelectorAll(".location-group-options").forEach(el => el.classList.remove("open"));
            document.querySelectorAll(".location-group-title").forEach(el => el.classList.remove("active"));
            if (willOpen) {
                options.classList.add("open");
                title.classList.add("active");
            }
        });

        card.append(title, options);
        wrapper.appendChild(card);
    });

    // Custom locations are intentionally excluded from the dashboard summary.
    body.appendChild(wrapper);
}

function openLocationManager() {
    document.getElementById("locationManagerModal").style.display = "flex";
    document.getElementById("newLocationName").value = "";
    renderLocationManagerList();
}

function closeLocationManager() {
    document.getElementById("locationManagerModal").style.display = "none";
}

function renderLocationManagerList() {
    const list = document.getElementById("locationManagerList");
    list.innerHTML = "";
    if (!otherLocations.length) { list.textContent = "No OTHER locations yet. Add one above."; return; }
    otherLocations.forEach(name => {
        const row = document.createElement("div");
        row.className = "location-manager-row";
        const input = document.createElement("input");
        input.type = "text"; input.maxLength = 100; input.value = name;
        input.setAttribute("aria-label", "Location name");
        const rename = document.createElement("button");
        rename.type = "button"; rename.className = "location-rename-btn"; rename.textContent = "Rename";
        rename.addEventListener("click", () => renameLocation(name, input.value));
        const del = document.createElement("button");
        del.type = "button"; del.className = "location-delete-btn"; del.textContent = "Delete";
        del.addEventListener("click", () => deleteLocation(name));
        row.append(input, rename, del); list.appendChild(row);
    });
}

async function sendLocationAction(payload) {
    const response = await fetch("manage_locations.php", {
        method: "POST", headers: {"Content-Type": "application/json"},
        body: JSON.stringify(payload)
    });
    const result = await response.json();
    if (!result.success) throw new Error(result.message || "Location action failed.");
    await loadLocations();
    renderLocationManagerList();
    return result;
}

async function addLocation() {
    const name = document.getElementById("newLocationName").value.trim();
    if (!name) { alert("Please enter a location name."); return; }
    try {
        const result = await sendLocationAction({action: "add", name});
        document.getElementById("newLocationName").value = "";
        alert(result.message || "Location added successfully.");
    } catch (error) { alert(error.message); }
}

async function renameLocation(oldName, newName) {
    newName = String(newName || "").trim();
    if (!newName) { alert("Location name cannot be empty."); return; }
    if (oldName === newName) return;
    if (!confirm(`Rename "${oldName}" to "${newName}"? Existing records will also be updated.`)) return;
    try {
        const result = await sendLocationAction({action: "rename", old_name: oldName, new_name: newName});
        alert(result.message || "Location renamed successfully.");
        await loadRecords();
    } catch (error) { alert(error.message); }
}

async function deleteLocation(name) {
    if (!confirm(`Delete location "${name}"? Locations used by existing records cannot be deleted.`)) return;
    try {
        const result = await sendLocationAction({action: "delete", name});
        alert(result.message || "Location deleted successfully.");
    } catch (error) { alert(error.message); }
}


function escapeHTML(value) {
    const div = document.createElement("div");
    div.textContent = value ?? "";
    return div.innerHTML;
}

function updateOtherLocationField() {

    const select =
        document.getElementById("location");

    const input =
        document.getElementById("otherLocation");

    if (select.value === "Others") {
        input.style.display = "block";
        input.required = true;
    } else {
        input.style.display = "none";
        input.required = false;
        input.value = "";
    }
}

function updateEditOtherLocationField() {

    const select =
        document.getElementById("editLocation");

    const input =
        document.getElementById("editOtherLocation");

    if (select.value === "Others") {
        input.style.display = "block";
        input.required = true;
    } else {
        input.style.display = "none";
        input.required = false;
        input.value = "";
    }
}

function applyTheme() {
    const darkMode =
        localStorage.getItem("scanningDarkMode") === "true";

    document.body.classList.toggle(
        "dark-mode",
        darkMode
    );

    const button =
        document.getElementById("themeToggle");

    if (button) {
        button.textContent =
            darkMode
                ? "☀️ Light Mode"
                : "🌙 Dark Mode";
    }
}

function toggleDarkMode() {
    const enabled =
        document.body.classList.toggle("dark-mode");

    localStorage.setItem(
        "scanningDarkMode",
        enabled ? "true" : "false"
    );

    const button =
        document.getElementById("themeToggle");

    if (button) {
        button.textContent =
            enabled
                ? "☀️ Light Mode"
                : "🌙 Dark Mode";
    }
}

function updateTaskFields() {

    const taskType =
        document.getElementById("taskType").value;

    const documentGroup =
        document.getElementById("documentsGroup");

    const detailsGroup =
        document.getElementById("detailsGroup");

    const needsDocumentCount =
        taskType === "Document Scanned" ||
        taskType === "Delivery";

    if (needsDocumentCount) {

        documentGroup.style.display = "flex";
        detailsGroup.style.display = "none";

        const label =
            document.getElementById("documentsLabel");

        label.textContent =
            taskType === "Delivery"
                ? "Number of Documents Delivered"
                : "Number of Documents Scanned";

    } else {

        documentGroup.style.display = "none";
        detailsGroup.style.display = "flex";

    }
}

function updateEditTaskFields() {

    const taskType =
        document.getElementById("editTaskType").value;

    const documentGroup =
        document.getElementById("editDocumentsGroup");

    const detailsGroup =
        document.getElementById("editDetailsGroup");

    const needsDocumentCount =
        taskType === "Document Scanned" ||
        taskType === "Delivery";

    if (needsDocumentCount) {

        documentGroup.style.display = "flex";
        detailsGroup.style.display = "none";

        const label =
            document.getElementById("editDocumentsLabel");

        label.textContent =
            taskType === "Delivery"
                ? "Number of Documents Delivered"
                : "Number of Documents Scanned";

    } else {

        documentGroup.style.display = "none";
        detailsGroup.style.display = "flex";

    }
}

function selectLocation(location, element) {

    document.getElementById("location").value =
        location;

    updateOtherLocationField();

    document.querySelectorAll(".location-option").forEach(button => button.classList.remove("selected"));
    if (element) element.classList.add("selected");
}

async function finishTask() {

    let location =
        document.getElementById("location").value;

    const taskType =
        document.getElementById("taskType").value;

    const documents =
        Number(document.getElementById("documents").value);

    const taskDetails =
        document.getElementById("taskDetails").value.trim();

    const fileDate =
        document.getElementById("fileDate").value;

    if (location === "Others") {

        location =
            document.getElementById("otherLocation").value.trim();

        if (!location) {
            alert("Please enter the location.");
            return;
        }

    } else if (!location) {

        alert("Please select a location.");
        return;
    }

    if (
        taskType === "Document Scanned" ||
        taskType === "Delivery"
    ) {

        if (
            !Number.isInteger(documents) ||
            documents < 1
        ) {
            alert(
                taskType === "Delivery"
                    ? "Please enter a valid number of documents delivered."
                    : "Please enter a valid number of documents scanned."
            );
            return;
        }

    } else if (!taskDetails) {

        alert("Please enter the task details.");
        return;
    }

    if (!fileDate) {

        alert("Please select the File Date.");
        return;
    }

    try {

        const response =
            await fetch("save.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    location,
                    taskType,
                    documents,
                    taskDetails,
                    fileDate
                })
            });

        const result =
            await response.json();

        if (!result.success) {

            alert(
                result.message ||
                "Failed to save task."
            );

            return;
        }

        document.getElementById("location").value = "";
        document.getElementById("otherLocation").value = "";
        document.getElementById("taskType").value =
            "Document Scanned";
        document.getElementById("documents").value = "";
        document.getElementById("taskDetails").value = "";
        document.getElementById("fileDate").value = "";

        updateOtherLocationField();
        updateTaskFields();

        document
            .querySelectorAll(".location-table th")
            .forEach(th => th.classList.remove("selected"));

        await loadRecords();

        alert("Task saved successfully.");

    } catch (error) {

        console.error(error);
        alert("Unable to save the task.");
    }
}

async function loadRecords() {

    try {

        let response = await fetch("get_records.php");
        if (response.status === 404) {
            response = await fetch("get_record.php");
        }

        const result =
            await response.json();

        if (!result.success) {

            alert(
                result.message ||
                "Failed to load records."
            );

            return;
        }

        allRecords =
            result.records || [];

        currentPage = 1;

        displayRecords(
            getDisplayedRecords()
        );

        updateSummary(allRecords);

    } catch (error) {

        console.error(error);
        alert("Unable to load records.");
    }
}

function getDisplayedRecords() {

    const search =
        document
            .getElementById("search")
            .value
            .toLowerCase()
            .trim();

    if (!search) {
        return allRecords;
    }

    return allRecords.filter(record => {

        const values = [
            record.location,
            record.task_type,
            record.task_details,
            record.documents,
            record.file_date,
            record.finished_at
        ];

        return values.some(value =>
            String(value ?? "")
                .toLowerCase()
                .includes(search)
        );
    });
}

function getDetailsDisplay(record) {

    const taskType =
        record.task_type ||
        "Document Scanned";

    const count =
        Number(record.documents || 0);

    if (taskType === "Document Scanned") {
        return count.toLocaleString() + " document(s) scanned";
    }

    if (taskType === "Delivery") {
        return count.toLocaleString() + " document(s) delivered";
    }

    return record.task_details || "—";
}

function formatFileDate(value) {

    if (!value) return "";

    const date =
        new Date(value + "T00:00:00");

    return date.toLocaleDateString(
        "en-PH",
        {
            year: "numeric",
            month: "long",
            day: "numeric"
        }
    );
}

function formatFinishedDate(value) {

    if (!value) return "";

    const date =
        new Date(
            String(value).replace(" ", "T")
        );

    return date.toLocaleString(
        "en-PH",
        {
            year: "numeric",
            month: "long",
            day: "numeric",
            hour: "numeric",
            minute: "2-digit",
            second: "2-digit",
            hour12: true
        }
    );
}

function displayRecords(records, printAll = false) {

    const tbody =
        document.getElementById("recordBody");

    const pagination =
        document.getElementById("pagination");

    if (!records.length) {

        tbody.innerHTML =
            '<tr><td colspan="7" class="empty">No accomplishment records found.</td></tr>';

        pagination.innerHTML = "";

        return;
    }

    const totalPages =
        Math.ceil(records.length / perPage);

    if (
        !printAll &&
        currentPage > totalPages
    ) {
        currentPage = totalPages;
    }

    const start =
        printAll
            ? 0
            : (currentPage - 1) * perPage;

    const end =
        printAll
            ? records.length
            : start + perPage;

    const visibleRecords =
        records.slice(start, end);

    tbody.innerHTML = "";

    visibleRecords.forEach(
        (record, index) => {

            const row =
                document.createElement("tr");

            row.innerHTML = `
                <td>${start + index + 1}</td>

                <td>
                    <strong>
                        ${escapeHTML(record.location)}
                    </strong>
                </td>

                <td>
                    ${escapeHTML(
                        record.task_type ||
                        "Document Scanned"
                    )}
                </td>

                <td>
                    ${escapeHTML(
                        getDetailsDisplay(record)
                    ).replace(
                        /\r?\n/g,
                        "<br>"
                    )}
                </td>

                <td>
                    ${escapeHTML(
                        formatFileDate(
                            record.file_date
                        )
                    )}
                </td>

                <td>
                    ${escapeHTML(
                        formatFinishedDate(
                            record.finished_at
                        )
                    )}
                </td>

                <td>
                    <button
                        class="edit-btn"
                        onclick="openEditModal(${Number(record.id)})"
                    >
                        ✏️ Edit
                    </button>

                    <button
                        class="delete-btn"
                        onclick="deleteRecord(${Number(record.id)})"
                    >
                        🗑️ Delete
                    </button>
                </td>
            `;

            tbody.appendChild(row);
        }
    );

    if (printAll) {

        pagination.innerHTML = "";

    } else {

        renderPagination(
            records.length,
            totalPages
        );
    }
}

function renderPagination(total, pages) {

    const pagination =
        document.getElementById("pagination");

    if (total <= perPage) {

        pagination.innerHTML = "";
        return;
    }

    let html = "";

    html += `
        <button
            onclick="changePage(${currentPage - 1})"
            ${currentPage === 1 ? "disabled" : ""}
        >
            ← Previous
        </button>
    `;

    for (let i = 1; i <= pages; i++) {

        html += `
            <button
                class="${i === currentPage ? "active" : ""}"
                onclick="changePage(${i})"
            >
                ${i}
            </button>
        `;
    }

    html += `
        <span>
            Page ${currentPage} of ${pages}
        </span>
    `;

    html += `
        <button
            onclick="changePage(${currentPage + 1})"
            ${currentPage === pages ? "disabled" : ""}
        >
            Next →
        </button>
    `;

    pagination.innerHTML = html;
}

function changePage(page) {

    const records =
        getDisplayedRecords();

    const totalPages =
        Math.ceil(records.length / perPage);

    if (
        page < 1 ||
        page > totalPages
    ) {
        return;
    }

    currentPage = page;

    displayRecords(records);
}

function searchRecords() {

    currentPage = 1;

    displayRecords(
        getDisplayedRecords()
    );
}

function updateSummary(records) {

    const totalDocuments =
        records
            .filter(record =>
                (
                    record.task_type ||
                    "Document Scanned"
                ) === "Document Scanned"
            )
            .reduce(
                (total, record) =>
                    total +
                    Number(record.documents || 0),
                0
            );

    const totalDeliveries =
        records
            .filter(record =>
                record.task_type === "Delivery"
            )
            .reduce(
                (total, record) =>
                    total + Number(record.documents || 0),
                0
            );

    const totalTroubleshooting =
        records.filter(record =>
            record.task_type === "Computer Troubleshooting"
        ).length;

    const totalOtherTasks =
        records.filter(record =>
            record.task_type === "Other Related Task"
        ).length;

    const locations =
        new Set(
            records.map(
                record => record.location
            )
        );

    document.getElementById(
        "totalEntries"
    ).textContent =
        records.length.toLocaleString();

    document.getElementById(
        "totalDocuments"
    ).textContent =
        totalDocuments.toLocaleString();

    document.getElementById(
        "totalDeliveries"
    ).textContent =
        totalDeliveries.toLocaleString();

    document.getElementById(
        "totalTroubleshooting"
    ).textContent =
        totalTroubleshooting.toLocaleString();

    document.getElementById(
        "totalOtherTasks"
    ).textContent =
        totalOtherTasks.toLocaleString();

    document.getElementById(
        "locationsCompleted"
    ).textContent =
        locations.size.toLocaleString();
}

function convertToDateTimeLocal(value) {

    if (!value) return "";

    const date =
        new Date(
            String(value).replace(" ", "T")
        );

    if (isNaN(date.getTime())) {
        return "";
    }

    return (
        date.getFullYear() +
        "-" +
        String(date.getMonth() + 1).padStart(2, "0") +
        "-" +
        String(date.getDate()).padStart(2, "0") +
        "T" +
        String(date.getHours()).padStart(2, "0") +
        ":" +
        String(date.getMinutes()).padStart(2, "0")
    );
}

function openEditModal(id) {

    const record =
        allRecords.find(
            item =>
                Number(item.id) === Number(id)
        );

    if (!record) {

        alert("Record not found.");
        return;
    }

    document.getElementById(
        "editId"
    ).value =
        record.id;

    const editLocation =
        document.getElementById(
            "editLocation"
        );

    const editOtherLocation =
        document.getElementById(
            "editOtherLocation"
        );

    if (
        standardLocations.includes(
            record.location
        )
    ) {

        editLocation.value =
            record.location;

        editOtherLocation.value = "";
        editOtherLocation.style.display =
            "none";

    } else {

        editLocation.value =
            "Others";

        editOtherLocation.value =
            record.location || "";

        editOtherLocation.style.display =
            "block";
    }

    document.getElementById(
        "editTaskType"
    ).value =
        record.task_type ||
        "Document Scanned";

    document.getElementById(
        "editDocuments"
    ).value =
        Number(record.documents || 0);

    document.getElementById(
        "editTaskDetails"
    ).value =
        record.task_details || "";

    document.getElementById(
        "editFileDate"
    ).value =
        record.file_date || "";

    document.getElementById(
        "editFinishedAt"
    ).value =
        convertToDateTimeLocal(
            record.finished_at
        );

    updateEditTaskFields();

    document.getElementById(
        "editModal"
    ).style.display =
        "flex";
}

function closeEditModal() {

    document.getElementById(
        "editModal"
    ).style.display =
        "none";
}

async function saveEdit() {

    const id =
        Number(
            document.getElementById(
                "editId"
            ).value
        );

    let location =
        document.getElementById(
            "editLocation"
        ).value;

    if (location === "Others") {

        location =
            document.getElementById(
                "editOtherLocation"
            ).value.trim();

        if (!location) {

            alert("Please enter the location.");
            return;
        }
    }

    const taskType =
        document.getElementById(
            "editTaskType"
        ).value;

    const documents =
        Number(
            document.getElementById(
                "editDocuments"
            ).value
        );

    const taskDetails =
        document.getElementById(
            "editTaskDetails"
        ).value.trim();

    const fileDate =
        document.getElementById(
            "editFileDate"
        ).value;

    const finishedAt =
        document.getElementById(
            "editFinishedAt"
        ).value;

    if (!location) {

        alert("Please select a location.");
        return;
    }

    if (
        (
            taskType === "Document Scanned" ||
            taskType === "Delivery"
        ) &&
        (
            !Number.isInteger(documents) ||
            documents < 1
        )
    ) {

        alert(
            taskType === "Delivery"
                ? "Please enter a valid number of documents delivered."
                : "Please enter a valid number of documents scanned."
        );

        return;
    }

    if (
        taskType !== "Document Scanned" &&
        taskType !== "Delivery" &&
        !taskDetails
    ) {

        alert(
            "Please enter the task details."
        );

        return;
    }

    if (!fileDate) {

        alert("Please select the File Date.");
        return;
    }

    if (!finishedAt) {

        alert("Please select the Date Scanned.");
        return;
    }

    try {

        const response =
            await fetch(
                "update.php",
                {
                    method: "POST",
                    headers: {
                        "Content-Type":
                            "application/json"
                    },
                    body:
                        JSON.stringify({
                            id,
                            location,
                            taskType,
                            documents,
                            taskDetails,
                            fileDate,
                            finishedAt
                        })
                }
            );

        const result =
            await response.json();

        if (!result.success) {

            alert(
                result.message ||
                "Failed to update record."
            );

            return;
        }

        closeEditModal();

        await loadRecords();

        alert(
            "Record updated successfully."
        );

    } catch (error) {

        console.error(error);

        alert(
            "Unable to update the record."
        );
    }
}

async function deleteRecord(id) {

    if (
        !confirm(
            "Are you sure you want to delete this record?"
        )
    ) {
        return;
    }

    try {

        const response =
            await fetch(
                "delete.php",
                {
                    method: "POST",
                    headers: {
                        "Content-Type":
                            "application/json"
                    },
                    body:
                        JSON.stringify({ id })
                }
            );

        const result =
            await response.json();

        if (!result.success) {

            alert(result.message);
            return;
        }

        await loadRecords();

    } catch (error) {

        console.error(error);

        alert(
            "Unable to delete record."
        );
    }
}


function openPrintModal() {

    document.getElementById("printModal").style.display = "flex";

}

function closePrintModal() {

    document.getElementById("printModal").style.display = "none";
}

function updatePrintDateFields() {
}

function startPrint() {

    const fromDate =
        document.getElementById("printFromDate").value;

    const toDate =
        document.getElementById("printToDate").value;

    if (!fromDate || !toDate) {
        alert("Please select both the From and To dates.");
        return;
    }

    if (fromDate > toDate) {
        alert("The From date cannot be later than the To date.");
        return;
    }

    const records = allRecords.filter(record => {

        // Date Scanned is stored in finished_at as YYYY-MM-DD HH:MM:SS.
        const scannedDate =
            String(record.finished_at || "").slice(0, 10);

        return scannedDate >= fromDate && scannedDate <= toDate;
    });

    if (!records.length) {
        alert("No records found for the selected date range.");
        return;
    }

    window.printRecords = records;

    closePrintModal();

    window.print();
}

function exportCSV() {

    window.location.href =
        "export.php";
}

function clearDatabase() {

    document.getElementById(
        "clearPassword"
    ).value = "";

    document.getElementById(
        "passwordModal"
    ).style.display =
        "flex";

    setTimeout(() => {

        document.getElementById(
            "clearPassword"
        ).focus();

    }, 100);
}

function closePasswordModal() {

    document.getElementById(
        "passwordModal"
    ).style.display =
        "none";

    document.getElementById(
        "clearPassword"
    ).value = "";
}

async function submitClearPassword() {

    const password =
        document.getElementById(
            "clearPassword"
        ).value;

    if (!password.trim()) {

        alert("Password is required.");
        return;
    }

    if (
        !confirm(
            "⚠️ FINAL WARNING!\n\n" +
            "All accomplishment records will be permanently deleted.\n\n" +
            "Continue?"
        )
    ) {
        return;
    }

    try {

        const response =
            await fetch(
                "clear.php",
                {
                    method: "POST",
                    headers: {
                        "Content-Type":
                            "application/json"
                    },
                    body:
                        JSON.stringify({
                            password
                        })
                }
            );

        const result =
            await response.json();

        if (!result.success) {

            alert(result.message);
            return;
        }

        closePasswordModal();

        await loadRecords();

        alert(result.message);

    } catch (error) {

        console.error(error);

        alert(
            "Unable to clear records."
        );
    }
}


document.getElementById("locationManagerModal").addEventListener("click", event => {
    if (event.target.id === "locationManagerModal") closeLocationManager();
});

document.getElementById("printModal").addEventListener(
    "click",
    event => {
        if (event.target.id === "printModal") {
            closePrintModal();
        }
    }
);

document
    .getElementById("clearPassword")
    .addEventListener(
        "keydown",
        event => {

            if (event.key === "Enter") {

                event.preventDefault();

                submitClearPassword();
            }
        }
    );

window.addEventListener(
    "beforeprint",
    () => {

        printingPage =
            currentPage;

        const records =
            window.printRecords || getDisplayedRecords();

        displayRecords(
            records,
            true
        );

        updateSummary(records);
    }
);

window.addEventListener(
    "afterprint",
    () => {

        currentPage =
            printingPage;

        window.printRecords = null;

        displayRecords(
            getDisplayedRecords()
        );

        updateSummary(
            allRecords
        );
    }
);

applyTheme();
updateTaskFields();
loadLocations().then(() => loadRecords());
</script>

</body>
</html>