<!DOCTYPE html>
<html>

<head>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .employee-details {
            margin-bottom: 20px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .footer {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Salary Slip</h1>
    </div>

    <div class="employee-details">
        <p><strong>Employee Name:</strong> {{ $employeeName }}</p>
        <p><strong>Employee ID:</strong> {{ $employeeId }}</p>
        <!-- Add more employee details if needed -->
    </div>

    <table class="table">
        <tr>
            <th>Earnings</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Basic Salary</td>
            <td>{{ $basicSalary }}</td>
        </tr>
        <!-- Add more earnings details if needed -->
    </table>

    <table class="table">
        <tr>
            <th>Deductions</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Taxes</td>
            <td>{{ $taxes }}</td>
        </tr>
        <!-- Add more deductions details if needed -->
    </table>

    <div class="footer">
        <p>Generated on: {{ $generatedOn }}</p>
    </div>
</body>

</html>
