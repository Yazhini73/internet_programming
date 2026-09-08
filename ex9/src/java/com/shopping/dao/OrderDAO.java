package com.shopping.dao;

import com.shopping.model.Order;
import com.shopping.util.DBConnection;
import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class OrderDAO {

    public boolean addOrder(Order order) {
        // Updated to use your new table and column names
        String sql = "INSERT INTO customer_orders (buyer_fullname, item_title, units, unit_cost, subtotal, purchase_date, shipping_location) VALUES (?,?,?,?,?,?,?)";

        try (Connection con = DBConnection.getConnection();
             PreparedStatement ps = con.prepareStatement(sql)) {

            ps.setString(1, order.getCustomerName());
            ps.setString(2, order.getProductName());
            ps.setInt(3, order.getQuantity());
            ps.setBigDecimal(4, order.getPrice());
            ps.setBigDecimal(5, order.getTotalAmount());
            ps.setDate(6, order.getOrderDate());
            ps.setString(7, order.getAddress());

            return ps.executeUpdate() > 0;
            
        } catch (SQLException e) {
            e.printStackTrace();
            return false;
        }
    }

    public List<Order> getAllOrders() {
        List<Order> orderList = new ArrayList<>();
        // Updated to select from your new table
        String sql = "SELECT * FROM customer_orders ORDER BY id DESC";

        try (Connection con = DBConnection.getConnection();
             Statement st = con.createStatement();
             ResultSet rs = st.executeQuery(sql)) {

            while (rs.next()) {
                Order o = new Order();
                // Map database columns to your Order model properties
                o.setOrderId(rs.getInt("id"));
                o.setCustomerName(rs.getString("buyer_fullname"));
                o.setProductName(rs.getString("item_title"));
                o.setQuantity(rs.getInt("units"));
                o.setPrice(rs.getBigDecimal("unit_cost"));
                o.setTotalAmount(rs.getBigDecimal("subtotal"));
                o.setOrderDate(rs.getDate("purchase_date"));
                o.setAddress(rs.getString("shipping_location"));
                orderList.add(o);
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return orderList;
    }
}