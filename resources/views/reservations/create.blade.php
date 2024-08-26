<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Restaurant Table Reservation</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }
        #restaurantCanvas {
            border: 5px solid #333;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
        }
        .tooltip {
            position: absolute;
            background-color: #333;
            color: #fff;
            padding: 8px;
            border-radius: 4px;
            display: none;
            font-size: 14px;
            z-index: 1000;
            white-space: nowrap;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div id="tooltip" class="tooltip"></div>
    <canvas id="restaurantCanvas" width="1200" height="800"></canvas>
    <script>
        const canvas = document.getElementById('restaurantCanvas');
        const ctx = canvas.getContext('2d');
        const tooltip = document.getElementById('tooltip');

        // Function to draw a table with a realistic style
        function drawTable(x, y, width, height, label, status) {
            ctx.save();
            ctx.translate(x + width / 2, y + height / 2);
            ctx.rotate(-Math.PI / 6); // Angle for a slight 3D effect

            // Draw table top
            ctx.fillStyle = '#8B4513'; // Table top color
            ctx.fillRect(-width / 2, -height / 2, width, height);
            ctx.strokeStyle = '#5C3317'; // Table border color
            ctx.lineWidth = 2;
            ctx.strokeRect(-width / 2, -height / 2, width, height);

            // Draw table legs
            ctx.fillStyle = '#5C3317'; // Table leg color
            const legWidth = 10;
            const legHeight = height / 2;
            ctx.fillRect(-width / 2, height / 2 - legHeight, legWidth, legHeight); // Left leg
            ctx.fillRect(width / 2 - legWidth, height / 2 - legHeight, legWidth, legHeight); // Right leg

            // Table label
            ctx.fillStyle = '#fff';
            ctx.font = '14px Arial';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(label, 0, 0);

            // Indicate table status
            if (status === 'occupied') {
                ctx.strokeStyle = '#FF6347'; // Red for occupied
                ctx.lineWidth = 4;
                ctx.strokeRect(-width / 2, -height / 2, width, height);
            } else if (status === 'reserved') {
                ctx.strokeStyle = '#FFD700'; // Gold for reserved
                ctx.lineWidth = 4;
                ctx.strokeRect(-width / 2, -height / 2, width, height);
            }

            ctx.restore();
        }

        // Function to draw a door with a realistic style
        function drawDoor(x, y, width, height) {
            ctx.fillStyle = '#654321'; // Door color
            ctx.fillRect(x, y, width, height);
            ctx.strokeStyle = '#3E2723'; // Door border
            ctx.lineWidth = 2;
            ctx.strokeRect(x, y, width, height);

            // Door knob
            ctx.fillStyle = '#000';
            ctx.beginPath();
            ctx.arc(x + width - 10, y + height / 2, 8, 0, Math.PI * 2, true);
            ctx.fill();
        }

        // Function to draw a window with a realistic style
        function drawWindow(x, y, width, height) {
            ctx.fillStyle = '#87CEEB'; // Window color
            ctx.fillRect(x, y, width, height);
            ctx.strokeStyle = '#1E90FF'; // Window border
            ctx.lineWidth = 2;
            ctx.strokeRect(x, y, width, height);

            // Window grid
            ctx.strokeStyle = '#1E90FF';
            ctx.beginPath();
            ctx.moveTo(x + width / 2, y);
            ctx.lineTo(x + width / 2, y + height);
            ctx.moveTo(x, y + height / 2);
            ctx.lineTo(x + width, y + height / 2);
            ctx.stroke();
        }

        // Function to draw the complete layout with advanced graphics
        function drawLayout() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Draw the door
            drawDoor(1150, 350, 50, 100);

            // Draw the windows
            drawWindow(50, 50, 150, 100);
            drawWindow(1050, 50, 150, 100);

            // Draw the tables
            const tables = [
                { x: 200, y: 100, width: 150, height: 100, label: 'Table 1', status: 'available' },
                { x: 400, y: 100, width: 150, height: 100, label: 'Table 2', status: 'occupied' },
                { x: 600, y: 100, width: 150, height: 100, label: 'Table 3', status: 'available' },
                { x: 800, y: 100, width: 150, height: 100, label: 'Table 4', status: 'reserved' },
                { x: 200, y: 250, width: 150, height: 100, label: 'Table 5', status: 'available' },
                { x: 400, y: 250, width: 150, height: 100, label: 'Table 6', status: 'occupied' },
                { x: 600, y: 250, width: 150, height: 100, label: 'Table 7', status: 'available' },
                { x: 800, y: 250, width: 150, height: 100, label: 'Table 8', status: 'reserved' }
            ];

            tables.forEach(table => {
                drawTable(table.x, table.y, table.width, table.height, table.label, table.status);
            });
        }

        // Adding interactivity with advanced tooltip
        canvas.addEventListener('mousemove', (event) => {
            const rect = canvas.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            const tables = [
                { x: 200, y: 100, width: 150, height: 100, label: 'Table 1' },
                { x: 400, y: 100, width: 150, height: 100, label: 'Table 2' },
                { x: 600, y: 100, width: 150, height: 100, label: 'Table 3' },
                { x: 800, y: 100, width: 150, height: 100, label: 'Table 4' },
                { x: 200, y: 250, width: 150, height: 100, label: 'Table 5' },
                { x: 400, y: 250, width: 150, height: 100, label: 'Table 6' },
                { x: 600, y: 250, width: 150, height: 100, label: 'Table 7' },
                { x: 800, y: 250, width: 150, height: 100, label: 'Table 8' }
            ];

            let isHovering = false;
            tables.forEach(table => {
                if (x > table.x && x < table.x + table.width && y > table.y && y < table.y + table.height) {
                    tooltip.textContent = `Table ${table.label}`;
                    tooltip.style.left = `${event.clientX + 10}px`;
                    tooltip.style.top = `${event.clientY + 10}px`;
                    tooltip.style.display = 'block';
                    isHovering = true;
                }
            });

            if (!isHovering) {
                tooltip.style.display = 'none';
            }
        });

        canvas.addEventListener('click', (event) => {
            const rect = canvas.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;

            const tables = [
                { x: 200, y: 100, width: 150, height: 100, label: 'Table 1' },
                { x: 400, y: 100, width: 150, height: 100, label: 'Table 2' },
                { x: 600, y: 100, width: 150, height: 100, label: 'Table 3' },
                { x: 800, y: 100, width: 150, height: 100, label: 'Table 4' },
                { x: 200, y: 250, width: 150, height: 100, label: 'Table 5' },
                { x: 400, y: 250, width: 150, height: 100, label: 'Table 6' },
                { x: 600, y: 250, width: 150, height: 100, label: 'Table 7' },
                { x: 800, y: 250, width: 150, height: 100, label: 'Table 8' }
            ];

            tables.forEach(table => {
                if (x > table.x && x < table.x + table.width && y > table.y && y < table.y + table.height) {
                    alert(`You selected Table ${table.label}!`);
                    // Highlight selected table
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    drawLayout();
                    drawTable(table.x, table.y, table.width, table.height, table.label, 'highlighted');
                }
            });
        });

        drawLayout();
    </script>
</body>
</html>
