<?php var_dump(is_dir("bootstrap/cache")); var_dump(is_writable("bootstrap/cache")); var_dump(@file_put_contents("bootstrap/cache/test-php.txt", "hello")); var_dump(error_get_last());
