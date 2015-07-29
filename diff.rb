# usage : ruby diff.rb b.txt a.txt [any character => show debug info]
def read_file(name, array)
  File.open(name){|f|
    f.each_line{|line|
      array.push(line)
    }
  }
end


origin = []
read_file(ARGV[0], origin)
puts

mod = []
read_file(ARGV[1], mod)

debug = ARGV[2] # debug 表示をするかどうかのフラグ。any character.

ori_index = 0
mod_index = 0
mod_index_search = 0

diff_flag = "" # same, delete, add

# origin の全要素に対して処理を回す
while ori_index < origin.length
  if debug
    puts "------"
    puts "-- ori_index : #{ori_index}, mod_index : #{mod_index}"
    puts "-B mod_index_search : #{mod_index_search}"
  end
  
  # 比較している行の内容が同じだったとき
  if origin[ori_index] == mod[mod_index]
    diff_flag = "same"

  else # 比較している行の内容が異なるとき    
    mod_index_search = mod_index+1
    diff_flag = "delete"
    while mod[mod_index_search] != nil
      if origin[ori_index] == mod[mod_index_search]
        diff_flag = "add"
        break
      end
      mod_index_search += 1;
    end # while end
  end
  if debug
    puts "-A mod_index_search : #{mod_index_search}"
  end

  ## origin の現在の処理行と mod の各行を比較したあとの処理
  case diff_flag
  when "same"   # origin と同じだったときの処理
    puts "#{ori_index} : #{origin[ori_index]}"
    mod_index += 1;
    ori_index += 1;
  when "delete" # origin から削除されたときの対処
    puts " Del : #{origin[ori_index]}"
    ori_index += 1;
  when "add"    # origin に追加されたときの対処
    for index in mod_index..mod_index_search-1 do
      puts " Add : #{mod[index]}"
    end
    mod_index = mod_index_search
  else
    puts diff_flag
  end
end

# origin の最後より後に追加されている要素を拾う
if mod_index < mod.length
  for index in mod_index..mod.length-1
    puts " Add : #{mod[index]}"
  end
end

