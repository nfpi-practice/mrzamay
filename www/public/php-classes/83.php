<?php
class FileManipulator
{
    public function create($filePath)
    {
        file_put_contents($filePath, '');
    }

    public function delete($filePath)
    {
        unlink($filePath);
    }

    public function copy($filePath, $copyPath)
    {
        copy($filePath, $copyPath);
    }

    public function rename($filePath, $newName)
    {
        rename($filePath, pathinfo($filePath, PATHINFO_DIRNAME) . "/" . $newName);
    }

    public function replace($filePath, $newPath)
    {
        rename($filePath, $newPath);
    }

    public function weigh($filePath)
    {
        return filesize($filePath) . " Bytes";
    }
}

$file = new FileManipulator();
$file->create('files/file1.txt');
file_put_contents('files/file1.txt', 'Hello World!');
$file->copy('files/file1.txt', "files/file2.txt");
$file->delete('files/file2.txt');
$file->rename('files/file1.txt', 'file2.txt');
print_r($file->weigh('files/file2.txt'));