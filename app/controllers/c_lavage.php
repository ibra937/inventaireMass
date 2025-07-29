<?php
    require 'app/Models/m_lavage.php';
    use App\Models\MLavage;
    $lavageModel = new MLavage();
    if (isset($_GET['src']) && $_GET['src'] == 'index') {
        $lavageModel->getLavageData();
    }

    
