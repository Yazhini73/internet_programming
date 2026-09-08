<%@ page contentType="text/html;charset=UTF-8" language="java" %>
<%@ page import="java.util.List" %>
<%@ page import="com.shopping.model.Order" %>
<%@ page import="com.shopping.dao.OrderDAO" %>
<!DOCTYPE html>
<html>
<head>
    <title>Active Dispatch Manifests</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #eef2f5; margin: 0; padding: 40px; }
        .container { max-width: 1100px; margin: auto; background: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 8px 20px rgba(0,0,0,0.08); }
        .header-row { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #f1f5f9; padding-bottom: 15px; margin-bottom: 20px; }
        h2 { color: #1e293b; margin: 0; }
        .btn-new { background: #10b981; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 14px; transition: background 0.2s; }
        .btn-new:hover { background: #059669; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #e2e8f0; padding: 12px 15px; text-align: left; font-size: 14px; }
        th { background-color: #334155; color: white; font-weight: 600; }
        tr:nth-child(even) { background-color: #f8fafc; }
        tr:hover { background-color: #f1f5f9; }
        .badge { background: #dbeafe; color: #1d4ed8; padding: 4px 8px; border-radius: 4px; font-weight: 600; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-row">
            <h2>📋 Active Dispatch Manifests</h2>
            <a href="orderForm.jsp" class="btn-new">+ Register New Dispatch</a>
        </div>
        
        <table>
            <tr>
                <th>Manifest ID</th>
                <th>Client Name</th>
                <th>Product Item</th>
                <th>Qty</th>
                <th>Unit Rate</th>
                <th>Subtotal Amount</th>
                <th>Dispatch Date</th>
                <th>Destination Address</th>
            </tr>
            <%
                OrderDAO dao = new OrderDAO();
                List<Order> orders = dao.getAllOrders();
                for (Order o : orders) {
            %>
            <tr>
                <td><span class="badge">#<%= o.getOrderId() %></span></td>
                <td><%= o.getCustomerName() %></td>
                <td><%= o.getProductName() %></td>
                <td><%= o.getQuantity() %></td>
                <td>$<%= o.getPrice() %></td>
                <td><strong>$<%= o.getTotalAmount() %></strong></td>
                <td><%= o.getOrderDate() %></td>
                <td><%= o.getAddress() %></td>
            </tr>
            <%
                }
            %>
        </table>
    </div>
</body>
</html>