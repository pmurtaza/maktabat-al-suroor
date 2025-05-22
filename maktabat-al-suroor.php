<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>UI - Department Links</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

	<div class="container mt-5">
		<h2 class="text-center">UI - Library</h2>
		<div class="accordion" id="departmentAccordion">
			<?php
			// Sample associative array containing department names and their respective links
			$departments = [
				"IT Department" => [
					"General IT Documents" => [
						["name" => "Server Access", "url" => "server_access.php"],
						["name" => "Software Guidelines", "url" => "software_guidelines.php"],
					],
					"Application Links" => [
						["name" => "TR", "uat_url" => "uat_tr.php", "prod_url" => "prod_tr.php"],
						["name" => "TWT", "uat_url" => "uat_twt.php", "prod_url" => "prod_twt.php"],
						["name" => "QH", "uat_url" => "uat_qh.php", "prod_url" => "prod_qh.php"]
					]
				],
				"Finance Department" => [
					"Reports & Policies" => [
						["name" => "Budget Report", "url" => "budget_report.php"],
						["name" => "Taxation Policies", "url" => "taxation.php"]
					]
				],
				"HR Department" => [
					"Policies and Procedures" => [
						["name" => "Employee Policies", "url" => "hr_policies.php"],
						["name" => "Recruitment Process", "url" => "recruitment.php"]
					]
				],
			];

			$index = 0;
			foreach ($departments as $department => $sections) { // Modified to iterate through sections
				$collapseId = "collapse" . $index;
			?>
				<div class="accordion-item">
					<h2 class="accordion-header" id="heading<?= $index ?>">
						<button class="accordion-button <?= $index == 0 ? '' : 'collapsed' ?>" type="button"
							data-bs-toggle="collapse"
							data-bs-target="#<?= $collapseId ?>"
							aria-expanded="<?= $index == 0 ? 'true' : 'false' ?>"
							aria-controls="<?= $collapseId ?>">
							<?= $department ?>
						</button>
					</h2>
					<div id="<?= $collapseId ?>" class="accordion-collapse collapse <?= $index == 0 ? 'show' : '' ?>"
						aria-labelledby="heading<?= $index ?>" data-bs-parent="#departmentAccordion">
						<div class="accordion-body">
							<?php foreach ($sections as $sectionTitle => $links) { // Added loop for sections ?>
								<h5><?= $sectionTitle ?></h5>
								<ul class="list-group mb-3">
									<?php foreach ($links as $link) { ?>
										<li class="list-group-item d-flex justify-content-start">
											<span class="fw-bold"><?= $link['name'] ?></span>
											<?php if (isset($link['uat_url']) && isset($link['prod_url'])) { ?>
												<a href="<?= $link['uat_url'] ?>" class="btn btn-sm btn-primary mx-2" target="_blank">UAT</a>
												<a href="<?= $link['prod_url'] ?>" class="btn btn-sm btn-success" target="_blank">Production</a>
											<?php } else { ?>
												<a href="<?= $link['url'] ?>" class="text-decoration-none" target="_blank">
													<?= $link['name'] ?>
												</a>
											<?php } ?>
										</li>
									<?php } ?>
								</ul>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php
				$index++;
			}
			?>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>