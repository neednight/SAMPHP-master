<?php
namespace autoload;
function autoload($directory)
{
	if(!is_dir($directory)) return;
	$scanned_dir = scandir($directory);

	$ignore = [
		'.',
		'..'
	];

	// Remove the ignored items
	$scanned_dir = array_diff($scanned_dir, $ignore);

	if(empty($scanned_dir)) return;

	if(count($scanned_dir) > 250)
  {
		throw new \Exception( 'Too many files attempted to load via autoload' );
	}

	foreach($scanned_dir as $item)
  {
		$filename  = $directory.'/'.$item;
		$real_path = realpath($filename);

		if(false === $real_path)
    {
			continue;
		}

		$filetype = filetype($real_path);

		if(empty($filetype))
    {
			continue;
		}

		if('dir' === $filetype)
    {
			autoload($real_path);
		}
		else if('file' === $filetype)
    {
			if(true !== is_readable($real_path)) {
				continue;
			}

			if(is_uploaded_file($real_path))
      {
				continue;
			}

			// Only for files that really exist
			if(true !== file_exists($real_path))
      {
				continue;
			}

			$pathinfo = pathinfo( $real_path );
      echo $pathinfo['filename'].'.'.$pathinfo['extension'];
			if(empty($pathinfo['filename']))
      {
				continue;
			}

			if(empty($pathinfo['extension']))
      {
				continue;
			}

			if ('php' !== $pathinfo['extension'])
      {
				continue;
			}

			$filesize = filesize( $real_path );

			if($filesize < 0 ){
				throw new \Exception( 'File size is negative, not autoloading' );
			}

			if($filesize > 300000)
      {
				throw new \Exception( 'File size is greater than 300kb, not autoloading' );
			}
			require_once($real_path);
		}
	}
}
