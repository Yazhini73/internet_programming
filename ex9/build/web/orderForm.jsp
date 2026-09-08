<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<!DOCTYPE html>
<html>
<head>
    <title>Warehouse Dispatch Desk</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #eef2f5; margin: 0; padding: 40px; }
        .wrapper { max-width: 500px; margin: auto; background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
        h2 { color: #1e293b; margin-top: 0; text-align: center; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; }
        .form-group { margin-bottom: 18px; }
        label { display: block; font-weight: 600; color: #475569; margin-bottom: 6px; font-size: 14px; }
        input[type="text"], input[type="number"], input[type="date"], textarea { width: 100%; padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; box-sizing: border-box; font-size: 14px; }
        input:focus, textarea:focus { outline: none; border-color: #3b82f6; box-shadow: 0 0 0 3px rgba(59,130,246,0.1); }
        .btn-submit { background: #2563eb; color: white; padding: 12px; border: none; width: 100%; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
        .btn-submit:hover { background: #1d4ed8; }
        .alert { background: #fee2e2; color: #991b1b; padding: 10px; border-radius: 6px; margin-bottom: 15px; text-align: center; font-weight: 600; }
        .nav-link { display: block; text-align: center; margin-top: 15px; color: #2563eb; text-decoration: none; font-size: 14px; font-weight: 600; }
        .nav-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Online Product</h2>
        
        <% if(request.getAttribute("errorMessage") != null) { %>
            <div class="alert"><%= request.getAttribute("errorMessage") %></div>
        <% } %>
        
        <form action="AddOrderServlet" method="post">
            <div class="form-group">
                <label>Client / Buyer Name:</label>
                <input type="text" name="customerName" placeholder="e.g. Acme Corporation" required/>
            </div>
            <div class="form-group">
                <label>Product Designation:</label>
                <input type="text" name="productName" placeholder="e.g. Industrial Sensor Kit" required/>
            </div>
            <div class="form-group">
                <label>Quantity Units:</label>
                <input type="number" name="quantity" min="1" placeholder="1" required/>
            </div>
            <div class="form-group">
                <label>Unit Rate ($):</label>
                <input type="number" step="0.01" name="price" placeholder="0.00" required/>
            </div>
            <div class="form-group">
                <label>Dispatch Target Date:</label>
                <input type="date" name="orderDate" required/>
            </div>
            <div class="form-group">
                <label>Destination Depot Address:</label>
                <textarea name="address" rows="3" placeholder="Enter delivery facility address..."></textarea>
            </div>
            <button type="submit" class="btn-submit">Authorize & Dispatch Order</button>
        </form>
        <a href="viewOrders.jsp" class="nav-link">View Active Dispatch Logs &rarr;</a>
    </div>
</body>
</html>