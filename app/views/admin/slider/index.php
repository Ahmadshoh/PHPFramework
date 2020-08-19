<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Слайдер</h1>
    </div>

    <form action="<?=ADMIN;?>/slider/add" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <div class="col-md-12">
                <div class="card shadow mb-4 border-primary">
                    <div class="card-header badge-primary">
                        <h4 class="card-title">Добавить изображение</h4>
                    </div>
                    <div class="card-body">
                        <input type="file" name="image" id="image" class="form-control-file" required>
                        <input type="submit" class="btn btn-success btn-block mt-4" value="Добавить">
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-header py-3 badge-primary">
            <h6 class="m-0 font-weight-bold">Картинки слайдера</h6>
        </div>
        <div class="card-body">
            <?php foreach ($images as $image): ?>
            <div class="col-12" style="position: relative;">
                <img src="<?=$image['img_path']?>" class="img-fluid mb-3 img-thumbnail w-100" alt="">
                <a href="<?=ADMIN;?>/slider/delete?id=<?=$image['id']?>">
                    <button class="btn btn-danger" style="position: absolute; top: 25px; right: 25px;">X</button>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>