<h1> <?= $title ?> </h1>
<table>
    <tr>
        <td>id</td>
        <td>товар</td>
        <td>ссылка на товар</td>
    </tr>
    <?php foreach ($data as $elem): ?>
        <tr>
            <td><?= $elem['id']; ?></td>
            <td><?= $elem['title']; ?></td>
            <td><a href="/products/one/<?= $elem['id']; ?>">ссылка на страницу</td>
        </tr>
    <?php endforeach; ?>
</table>