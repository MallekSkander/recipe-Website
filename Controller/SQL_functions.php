<?php



function search_recipe($db, $search_term){
    $sql = 'SELECT distinct(instructions.name), instructions.id
            FROM instructions INNER JOIN recipe
            ON instructions.id = recipe.ins_id
            WHERE instructions.name LIKE :search OR recipe.ing_id LIKE :search';
    try{
        $statement = $db->prepare($sql);
        $statement->bindParam(':search', $search_term, PDO::PARAM_STR);
        $statement->execute();
    }catch(Exception $e){
        echo "Could not search: ".$e->getMessage();
        exit;
    }
    $result = $statement->fetchAll();
    return $result;
}





// R E C I P E S

function find_all_recipes($db){
    try{
        $query = 'SELECT *   FROM instructions';
        $statement = $db->query($query);
    }catch(Exception $e){
        echo "Unable to retrieve recipes";
        exit;
    }
    return $statement;
}


function find_recipe_by_id($db, $instruction_id)
{
    try {
        $query = 'SELECT * FROM instructions
                    WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $instruction_id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to retrieve find__recipe";
        exit;
    }
    return $statement;
}



function create_new_recipe_instructions($db,$name,$instructions) {
    $query = 'INSERT  INTO instructions (name, content) VALUES (:name, :content)';

    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':content',$instructions, PDO::PARAM_STR);

        $statement->execute();
        $id = $db->lastInsertId();
    }catch(Exception $e){
        return false;
    }
    return $id;
}




function create_new_recipe_ingredients($db,$new_recipe_id,$ing_id_qty_list) {
    $query = 'INSERT INTO recipe (ins_id, ing_id, quantity)
                VALUES(:ins_id,:ing_id,:quantity)';

    try{
        $statement = $db->prepare($query);

        foreach ($ing_id_qty_list as $ing_id => $qty) {

            $statement->bindParam(':ins_id', $new_recipe_id, PDO::PARAM_INT);
            $statement->bindParam(':ing_id', $ing_id, PDO::PARAM_INT);
            $statement->bindParam(':quantity', $qty, PDO::PARAM_INT);
            $statement->execute();
        }
    }catch(Exception $e){
        return false;
    }
    return true;
}












function create_new_recipe_categories($db,$new_recipe_id,$cat_id_list) {
    $query = 'INSERT INTO assigned_categories (ins_id, cat_id)
                VALUES(:ins_id,:cat_id)';

    try{
        $statement = $db->prepare($query);

        foreach ($cat_id_list as $cat_id) {

            $statement->bindParam(':ins_id', $new_recipe_id, PDO::PARAM_INT);
            $statement->bindParam(':cat_id', $cat_id, PDO::PARAM_INT);
            $statement->execute();
        }
    }catch(Exception $e){
        return false;
    }
    return true;
}




















function update_recipe_instructions($db,$id,$recipe_name,$instructions){
    try{
        $query = 'UPDATE instructions 
                    SET name = :name, content = :content
                    WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->bindParam(':name',$recipe_name, PDO::PARAM_STR);
        $statement->bindParam(':content',$instructions, PDO::PARAM_STR);
        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return true;

}















function delete_instructions($db, $recipe_id)
{
    try {
        $query1 = 'DELETE FROM instructions
                WHERE id = :id';

        $statement = $db->prepare($query1);
        $statement->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to delete this instructions";
        return false;
    }
}













function delete_assigned_categories($db, $recipe_id)
{
    try {
        $query1 = 'DELETE FROM assigned_categories
                WHERE ins_id = :id';

        $statement = $db->prepare($query1);
        $statement->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to delete this assigned_categories";
        return false;
    }
}


















function delete_recipe($db, $recipe_id)
{
    try {
        $query1 = 'DELETE FROM recipe
                WHERE ins_id = :id';

        $statement = $db->prepare($query1);
        $statement->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to delete this recipe";
        return false;
    }
}





























// I N G R E D I E N T S



function find_all_ingredients($db){
    try{
        $query = 'SELECT *   FROM ingredients';
        $statement = $db->query($query);
    }catch(Exception $e){
        echo "Unable to retrieve recipes";
        exit;
    }
    return $statement;
}














function find_ingredients_of_recipe($db, $instruction_id)
{
    try {
        $query = 'SELECT * FROM recipe
                    WHERE ins_id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $instruction_id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to retrieve find_ingredients_of_recipe";
        exit;
    }
    return $statement;
}























function find_name_of_ingredient($db, $ingredient_id)
{
    try {
        $query = 'SELECT * FROM ingredients
                    WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $ingredient_id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to retrieve find_name_of_ingredient";
        exit;
    }
    $ingredients=$statement->fetch(PDO::FETCH_ASSOC);
    return $ingredients['name'];
}






















function create_new_ingredient($db,$new_ingredient_name) {
    $query = 'INSERT INTO ingredients(name)
                VALUES(:name)';

    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':name', $new_ingredient_name, PDO::PARAM_STR);
        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return true;
}















function update_to_date_ingredient($db,$ingredient_id,$new_value){
    try{
        $query = 'UPDATE ingredients 
                    SET name = :name
                    WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $ingredient_id, PDO::PARAM_INT);
        $statement->bindParam(':name',$new_value, PDO::PARAM_STR);

        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return true;

}

















function del_ingredient($db, $ingredient_id)
{
    try {
        $query1 = 'DELETE FROM ingredients
                WHERE id = :id';

        $statement = $db->prepare($query1);
        $statement->bindParam(':id', $ingredient_id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to delete this ingredientt";
        return false;
    }
}












// C A T E G O R I E S







function find_all_cat($db){
    try{
        $query = 'SELECT *   FROM categories';
        $statement = $db->query($query);
    }catch(Exception $e){
        echo "Unable to retrieve recipes";
        exit;
    }
    return $statement;
}















function find_cat_of_recipe($db, $id)
{
    try {
        $query = 'SELECT * FROM assigned_categories
                    WHERE ins_id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to retrieve categories_of_recipe";
        exit;
    }
    return $statement;

}



















function find_name_of_cat($db, $id)
{
    try {
        $query = 'SELECT * FROM categories
                    WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to retrieve find_cat_of_cat";
        exit;
    }
    $category=$statement->fetch(PDO::FETCH_ASSOC);
    return $category['name'];


}






















function create_new_cat($db,$new_category_name) {
    $query = 'INSERT INTO categories(name)
                VALUES(:name)';

    try{
        $statement = $db->prepare($query);
        $statement->bindParam(':name', $new_category_name, PDO::PARAM_STR);
        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return true;
}























function update_cat($db,$category_id,$new_value){
    try{
        $query = 'UPDATE categories 
                    SET name = :name
                    WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindParam(':id', $category_id, PDO::PARAM_INT);
        $statement->bindParam(':name',$new_value, PDO::PARAM_STR);

        $statement->execute();
    }catch(Exception $e){
        return false;
    }
    return true;

}















function delete_cat($db, $category_id)
{
    try {
        $query1 = 'DELETE FROM categories
                WHERE id = :id';

        $statement = $db->prepare($query1);
        $statement->bindParam(':id', $category_id, PDO::PARAM_INT);
        $statement->execute();
    } catch (Exception $e) {
        echo "Unable to delete this Category";
        return false;
    }
}
?>