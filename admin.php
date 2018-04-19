<?php
    require "includes/config.php";
?>
<div id="comment-add-form" class="block">
  <h3>Добавить запись</h3>
  <div class="block__content">
    <form class="form" method="POST" action="/admin.php">
<?php
        if(isset($_POST['do_post']))
        {
            $errors = array();
            if($_POST['name'] == '')
            {
                $errors[] = 'Введите имя!';
            }
            
            if($_POST['category'] == '')
            {
                $errors[] = 'Введите категорию!';
            }
            
            
            if($_POST['text'] == '')
            {
                $errors[] = 'Введите текст!';
            }
            
            if(empty($errors))
            {
                // добавить комментарий
                
                mysqli_query($connection, "INSERT INTO articles (title, text, categorie_id, pubdate) 
                                            VALUES ('".$_POST['name']."', '".$_POST['text']."', '".$_POST['category']."', NOW())");
                
                echo '<span style="color: green;font-weight: bold;margin-bottom: 10px;display: block;">Комментарий добавлен</span>';
            }else
            {
                // вывести ошибку
                echo '<span style="color: red;font-weight: bold;margin-bottom: 10px;display: block;">' .$errors['0'] . '</span>';
            }
        }
    ?>
      <div class="form__group">
        <div class="row">
          <div class="col-md-4">
            <input type="text" class="form__control" name="name" placeholder="Название записи" value="<?php echo $_POST['name'] ?>">
          </div>
          <div class="col-md-4">
            <input type="text" class="form__control" name="category" placeholder="Категория" value="<?php echo $_POST['category'] ?>">
          </div>
        </div>
      </div>
      <div class="form__group">
        <textarea name="text" class="form__control" placeholder="Текст записи ..."><?php echo $_POST['text'] ?></textarea>
      </div>
      <div class="form__group">
        <input type="submit" class="form__control" name="do_post" value="Добавить запись">
      </div>
    </form>
  </div>
</div>