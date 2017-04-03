<form id="pembelian" action="http://localhost/SIA/pembelian/InputPembelian.php" method="post">
    <div class="form-group row">
        <div class="row">
            <p class="text-center"><strong>Nama Customer</strong></p>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <input class="form-control" id="nama_pembeli" type="text" name="nama_pembeli" placeholder="Nama Customer"/>
            </div>
        </div>
    </div>
    <?php for ( $i = 1; $i <= $form; ++$i ): ?>
        <div class="form-group row">
            <label class="col-md-1 col-form-label" for="nama_pembeli"><?php echo $i ?></label>
            <div class="col-md-9">
                <select class="form-control" id="id_barang" name="id_barang[]">
                    <?php foreach ( $kumpulanBarang as $barang ): ?>
                        <option value="<?php echo $barang['id'] ?>"><?php echo $barang['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <input class="form-control" id="total_pembelian" type="text" name="total_pembelian[]" placeholder="Total Pembelian"/>
            </div>
        </div>
    <?php endfor; ?>
    <input type="hidden" name="total-form" value="<?php echo $form ?>">
    <p class="text-center"><button class="btn btn-primary" type="submit">Proses</button></p>
</form>
