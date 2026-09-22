<?php
require_once 'config.php';
require_login();
include 'includes/header.php';

$stmt = $conn->prepare(
  "SELECT c.title, c.instructor, c.duration, e.enrolled_at
   FROM enrollments e JOIN courses c ON e.course_id = c.id
   WHERE e.user_id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>

<h2>Welcome, <?= htmlspecialchars($_SESSION['user_name']) ?> 👋</h2>
<p>You are enrolled in <strong><?= $result->num_rows ?></strong> course(s).</p>

<div class="grid">
<?php while ($row = $result->fetch_assoc()): ?>
  <div class="card">
    <h3><?= htmlspecialchars($row['title']) ?></h3>
    <p>Instructor: <?= htmlspecialchars($row['instructor']) ?></p>
    <p>Duration: <?= htmlspecialchars($row['duration']) ?></p>
    <small>Enrolled on <?= $row['enrolled_at'] ?></small>
  </div>
<?php endwhile; ?>
</div>

<?php if ($result->num_rows === 0): ?>
  <a class="btn" href="courses.php">Browse Courses</a>
<?php endif; ?>

<?php include 'includes/footer.php'; ?>