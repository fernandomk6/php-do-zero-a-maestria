<?php
  include_once("./data/posts.php");
  include_once("./data/categories.php");
  include_once("templates/header.php");
  session_start();

  function validaNovoPost($data) {
    foreach ($data as $value) {
      if (empty($value)) return false;
    }

    return true;
  }

  function uploadImage($imageFullName) {
    if (isset($imageFullName)) {
      $ext = strtolower(substr($imageFullName['name'],-4)); //Pegando extensão do arquivo
      $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      $_POST['img'] = $new_name; // atualiza nome da imagem
      $dir = './img/'; // Diretório para uploads 
      move_uploaded_file($imageFullName['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
   }
  }

  function setPostInSession($post) {
    $_SESSION["novo_post"] = $post;
  }

  function insert_post($data) {
    if (isset($_POST['title']) && isset($_POST['description'])) {
      if (!validaNovoPost($_POST)) return;

      uploadImage($_FILES['img']);
      setPostInSession($_POST);

      header("location: index.php");
      exit;
    }
  }

  insert_post($_POST);
?>
  <header>
    <h1>Cadastre o seu post</h1>
    <p>Preencha os dados do seu post</p>
  </header>

  <main>
    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" value="2" name="id">
      <label>
        <span>Titulo</span>
        <input type="text" name="title">
      </label>
      <label>
        <span>Descrição</span>
        <textarea name="description"></textarea>
      </label>
      <label>
        <span>Categorias</span>
        <?php 
          foreach ($categories as $categorie) { ?>
            <label>
              <span><?=$categorie?></span>
              <input type="checkbox" id="<?=$categorie?>" name="tags[]" value="<?=$categorie?>">
            </label>
          <?php }
        ?>
      </label>
      <label>
        <span>Capa do POST</span>
        <input type="file" name="img" accept="image/*">
      </label>
      <button type="submit">
        Cadastrar
      </button>
    </form>
  </main>

<?php
  include_once("templates/footer.php")
?>