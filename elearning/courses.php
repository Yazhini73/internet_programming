<?php
include 'includes/header.php';
$courses = $conn->query("SELECT * FROM courses");
?>

<h2>Available Courses</h2>
<div class="grid">
<?php while ($c = $courses->fetch_assoc()): ?>
  <div class="card">
    <h3><?= htmlspecialchars($c['title']) ?></h3>
    <p><?= htmlspecialchars($c['description']) ?></p>
    <p><strong>Instructor:</strong> <?= htmlspecialchars($c['instructor']) ?></p>
    <p><strong>Duration:</strong> <?= htmlspecialchars($c['duration']) ?></p>
    <form method="POST" action="enroll.php">
      <input type="hidden" name="course_id" value="<?= $c['id'] ?>">
      <button class="btn" type="submit">Enroll</button>
    </form>
  </div>
<?php endwhile; ?>
</div>

<?php include 'includes/footer.php'; ?>