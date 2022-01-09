<?
echo "\r\n\r\nIt's work!\r\n\r\nType any commands for test it, type \"bye\" for disconnect or type \"die\" for stopping container";


// Создание сокета TCP: resource socket_create(1, 2, 3);
// 1) AF_INET - семейство протокола или домен. Для соединений
//              осуществляемых через интернет используется AF_INET,
//              для UNIX используется AF_Unix (но об этом позже)
// 2) SOCK_STREAM - обычно используется для TCP (SOCK_DGRAM - UDP)
// 3) Протокол для TCP - SOL_TCP, UDP - SOL_UDP
// возвращает дескриптор сокета
if(($socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0)
{
    socket_close($socket); 
    die("Невозможно создать сокет: " .
        socket_strerror(socket_last_error()) . "\r\n");
} 

// Биндим сокет на определённый адрес и порт: 
if(($error = socket_bind($socket, "0.0.0.0", 31337)) < 0)
{
    socket_close($socket); 
    die("Невозможно привязать сокет :" .
        socket_strerror(socket_last_error()). "\r\n");
} 

// Прослушиваем сокет: boolean socket_listen(1, 2);
// backlog размер очереди запросов ожидающих соединения
if(($error = socket_listen($socket, 5)) < 0)
{
    socket_close($socket); 
    die("Невозможно прослушать сокет: " .
        socket_strerror(socket_last_error()) . "\r\n\r\n");
} 

while(1)
  {
     // ожидаем соединение
     // socket_accept(дескрипток сокета) - принимает входящие соединение и делает на скрипт сервером.
     if(($accept = socket_accept($socket)) < 0)
       {
          socket_close($socket); 
          die("Ошибка при чтении: " .
          socket_strerror($message) . "\r\n\r\n");
          break;
       } 

      // выводим рандомную строку из файла
      socket_write($accept, "Daemon is alive!\r\n\r\nType any commands for test it, type \"bye\" for disconnect or type \"die\" for stopping container\r\n\r\n");
      print(date("Y-m-d H:i:s", time())." STATUS: client connected\r\n\r\n");
      while(TRUE)
        {
           // Считываем заданное количество байт из указанного сокета
           if(FALSE === ($line = @socket_read($accept, 2048)))
             {
                print("Невозможно прослушать сокет: " .
                socket_strerror(socket_last_error()) . "\r\n\r\n");
                break 2;
             }
           switch(strtolower(trim($line)))
             {
                case "bye"  :
                print(date("Y-m-d H:i:s", time())." STATUS: client close connection\r\n\r\n");
                break 2;
            break;
                case "more" :
                // записываем данные из буфера в сокет
                if(!@socket_write($accept, "Daemon is alive!\r\n"))
                  {
                    print(date("Y-m-d H:i:s", time())." STATUS: client close connection\r\n");
                    break 2;
                  }
            break;
                case "die"  :
                socket_close($socket); 
                exit("Client kill daemon!!!\r\n\r\n");
                die("Client kill daemon!!!\r\n\r\n");
                break 2;
            break;
            default :
                //echo "Inputed text: " . $line . "\r\n";
                // записываем данные из буфера в сокет
                if(!@socket_write($accept, "Unknown command, 'bye' to exit.\r\n"))
                  {
                    print(date("Y-m-d H:i:s", time())." STATUS: client close connection\r\n\r\n");
                    break 2;
                  }
            break;
              }
        print(date("Y-m-d H:i:s", time()). " READ: ".$line."\r\n\r\n");
        //ob_get_contents();
        //ob_flush();
          }
    // закрываем соединение
    socket_close($accept);
  }

// Закрываем сокет
socket_close($socket); 

?>