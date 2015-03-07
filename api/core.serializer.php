<?
class Serializer {
	function serialize($filename, $data) {
		$file=fopen($filename,'w');
		fwrite($file, serialize($data));
		fclose($file);
	}
	
	function unserialize($filename) {
		if (file_exists($filename)) {
			$data = unserialize(file_get_contents($filename));
			return $data;
		}
		return null;
	}
}
?>