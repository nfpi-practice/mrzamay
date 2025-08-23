<?php
require_once "interface.php";

class File implements iFile
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function getPath()
    {
        return $this->filePath;
    }

    public function getDir()
    {
        return pathinfo($this->filePath, PATHINFO_DIRNAME);
    }

    public function getName()
    {
        return pathinfo($this->filePath, PATHINFO_FILENAME);
    }

    public function getExt()
    {
        return pathinfo($this->filePath, PATHINFO_EXTENSION);
    }

    public function getSize()
    {
        return filesize($this->filePath);
    }

    public function getText()
    {
        return file_get_contents($this->filePath);
    }

    public function setText($text)
    {
        file_put_contents($this->filePath, $text);
    }

    public function appendText($text)
    {
        file_put_contents($this->filePath, file_get_contents($this->filePath) . " " . $text);
    }

    public function copy($copyPath)
    {
        copy($this->filePath, $copyPath);
    }

    public function delete()
    {
        unlink($this->filePath);
    }

    public function rename($newName)
    {
        $newPath = "files/" . $newName;
        rename($this->filePath, $newPath);
        $this->filePath = "$newPath";
    }

    public function replace($newPath)
    {
        $newPath = "files/" . $newPath;
        rename($this->filePath, $newPath);
        $this->filePath = "$newPath";
    }

    public function printDirFiles($folder = "files")
    {
        $str = "";
        foreach (array_diff(scandir($folder), ['..', '.']) as $key => $file) {
            $str .= $file . " ";
        }
        return $str;
    }
}


$file1 = new File("files/text1.txt");
print_r("File Path: " . $file1->getPath() .
    "<br>File Dir: " . $file1->getDir() .
    "<br>File Name: " . $file1->getName() .
    "<br>File Ext: " . $file1->getExt() .
    "<br>File Size: " . $file1->getSize() . " Bytes" .
    "<br>File Text: " . $file1->getText() .
    $file1->setText("XD o_O -_- :3 *_*") .
    "<br>File Text after setText: " . $file1->getText() .
    $file1->appendText("^-^") .
    "<br>File Text after appendText: " . $file1->getText() .
    $file1->copy("files/text2.txt") .
    "<br>Dir Files after copy: " . $file1->printDirFiles() .
    $file1->delete() .
    "<br>Dir Files after delete: " . $file1->printDirFiles());
$file2 = new File("files/text2.txt");
$file2->rename("text1.txt");
print_r("<br>Dir Files after rename: " . $file2->printDirFiles());
mkdir("files/newFolder");
print_r($file2->replace("newFolder/text1.txt") .
    "<br>New folder Files: " . $file2->printDirFiles("files/newFolder"));

$file2->delete();
rmdir("files/newFolder");

file_put_contents("files/text1.txt", "Тут будут эмоджи :)");