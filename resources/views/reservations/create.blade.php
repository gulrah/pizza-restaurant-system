<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Table Selection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Heebo', sans-serif;
            color: #333;
        }
        .selection-area {
            width: 85%;
            max-width: 1200px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        .title {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
            font-weight: bold;
            color: #444;
            letter-spacing: 1px;
        }
        .layout {
            position: relative;
            width: 100%;
            height: 600px;
            background: linear-gradient(135deg, #f9f9f9, #e8e8e8);
            border-radius: 15px;
            box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .window, .door {
            position: absolute;
            font-size: 1.5rem;
            color: #888;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            padding: 10px 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .window {
            top: 50%;
            transform: translateY(-50%);
            width: 100px;
            height: 60px;
        }
        .window.left {
            left: 20px;
        }
        .window.right {
            right: 20px;
        }
        .door {
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 60px;
        }
        .table-wrapper {
            position: absolute;
            width: 90px;
            height: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .table {
            width: 100%;
            height: 100%;
            background: #f5f5f5;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            color: #fff;
            font-size: 1.2rem;
            font-weight: bold;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            background-size: cover;
            background-position: center;
        }
        .table.selected {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            background-color: #28a745;
        }
        .table-number {
            z-index: 1;
        }
        .confirm-btn {
            display: block;
            margin: 40px auto;
            padding: 15px 35px;
            font-size: 1.2rem;
            border-radius: 30px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            transition: background-color 0.3s, transform 0.3s;
        }
        .confirm-btn:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }
    </style>
</head>
<body>
    <div class="container selection-area">
        <h2 class="title">Select Your Table</h2>
        <div class="layout">
            <div class="window left">
                <i class="fas fa-window-maximize"></i><br>Window
            </div>
            <div class="window right">
                <i class="fas fa-window-maximize"></i><br>Window
            </div>
            <div class="door">
                <i class="fas fa-door-open"></i><br>Door
            </div>
            <div class="table-wrapper" style="top: 130px; left: 150px;">
                <div class="table" data-table="1" style="background-image: url('https://via.placeholder.com/90x90'); background-color: #d35400;">
                    <span class="table-number">1</span>
                </div>
            </div>
            <div class="table-wrapper" style="top: 130px; left: 300px;">
                <div class="table" data-table="2" style="background-image: url('https://via.placeholder.com/90x90'); background-color: #e67e22;">
                    <span class="table-number">2</span>
                </div>
            </div>
            <div class="table-wrapper" style="top: 130px; left: 450px;">
                <div class="table" data-table="3" style="background-image: url('https://via.placeholder.com/90x90'); background-color: #f39c12;">
                    <span class="table-number">3</span>
                </div>
            </div>
            <div class="table-wrapper" style="top: 250px; left: 150px;">
                <div class="table" data-table="4" style="background-image: url('https://via.placeholder.com/90x90'); background-color: #e74c3c;">
                    <span class="table-number">4</span>
                </div>
            </div>
            <div class="table-wrapper" style="top: 250px; left: 300px;">
                <div class="table" data-table="5" style="background-image: url('https://via.placeholder.com/90x90'); background-color: #c0392b;">
                    <span class="table-number">5</span>
                </div>
            </div>
            <div class="table-wrapper" style="top: 250px; left: 450px;">
                <div class="table" data-table="6" style="background-image: url('https://via.placeholder.com/90x90'); background-color: #d35400;">
                    <span class="table-number">6</span>
                </div>
            </div>
            <div class="table-wrapper" style="top: 370px; left: 150px;">
                <div class="table" data-table="7" style="background-image: url('https://via.placeholder.com/90x90'); background-color: #2980b9;">
                    <span class="table-number">7</span>
                </div>
            </div>
            <div class="table-wrapper" style="top: 370px; left: 300px;">
                <div class="table" data-table="8" style="background-image: url('https://via.placeholder.com/90x90'); background-color: #3498db;">
                    <span class="table-number">8</span>
                </div>
            </div>
        </div>
        <button id="confirm-selection" class="btn confirm-btn">Confirm Selection</button>
    </div>

    <script>
        const tables = document.querySelectorAll('.table');
        let selectedTable = null;

        tables.forEach(table => {
            table.addEventListener('click', () => {
                if (selectedTable) {
                    selectedTable.classList.remove('selected');
                }
                table.classList.add('selected');
                selectedTable = table;
            });
        });

        document.getElementById('confirm-selection').addEventListener('click', () => {
            if (selectedTable) {
                alert('You have selected table ' + selectedTable.dataset.table);
            } else {
                alert('Please select a table.');
            }
        });
    </script>
</body>
</html>
