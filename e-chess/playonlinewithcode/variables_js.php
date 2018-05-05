function getVariables1(){ 
    var source = <?php echo json_encode($source); ?>;
    return source;
};

function getVariables2(){ 
    var target = <?php echo json_encode($target); ?>;  
    return target;
};