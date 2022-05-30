/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.atp_fundamentos_big_data_wilian_krinke;

import java.io.IOException;
import org.apache.hadoop.conf.Configuration;
import org.apache.hadoop.fs.Path;
import org.apache.hadoop.io.IntWritable;
import org.apache.hadoop.io.Text;
import org.apache.hadoop.mapreduce.Job;
import org.apache.hadoop.mapreduce.Mapper;
import org.apache.hadoop.mapreduce.Reducer;
import org.apache.hadoop.mapreduce.lib.input.FileInputFormat;
import org.apache.hadoop.mapreduce.lib.output.FileOutputFormat;

/**
 *
 * @author wilian.krinke
 */
public class Informacao3 {  
    
    public static class Implementacao3MapperAtp extends Mapper<Object, Text, Text, IntWritable>{
        
        @Override
        public void map(Object id, Text valor, Context context) throws IOException, InterruptedException{
            String linha = valor.toString();
            String[] campos = linha.split(";");
            
            IntWritable one = new IntWritable(1);
            
            if(campos.length == 10){
                /*Quantidade de transações comerciais realizadas por ano*/;                
               Text ano = new Text(campos[1]);
               context.write(ano, one);               
                
            }        
        }
    }
    
    public static class Implementacao3ReducerAtp extends Reducer<Text, IntWritable, Text, IntWritable>{
    
        @Override
        public void reduce(Text chave, Iterable<IntWritable> valores, Context context) throws IOException, InterruptedException{
            int soma = 0;
            IntWritable resultado = new IntWritable();
            
            for(IntWritable valor : valores){
                soma += valor.get();                
            }
            
            resultado.set(soma);
            context.write(chave, resultado);
        }
    
    }
    
    public static void main(String[] args) throws IOException, InterruptedException, ClassNotFoundException{
       
        String entrada_arquivo = "/home2/ead2022/SEM1/wilian.krinke/Documents/base_100_mil.csv";
        String saida_pasta = "/home2/ead2022/SEM1/wilian.krinke/Documents/tarefa3";
        
        if(args.length == 2){
            entrada_arquivo = args[0];
            saida_pasta = args[1];
        }
        
        Configuration conf = new Configuration();
        Job job = Job.getInstance(conf, "Implementação3.txt");
        
        job.setJarByClass(Informacao3.class);
        job.setMapperClass(Implementacao3MapperAtp.class);
        job.setReducerClass(Implementacao3ReducerAtp.class);
        
        job.setOutputKeyClass(Text.class);
        job.setOutputValueClass(IntWritable.class);
        
        FileInputFormat.addInputPath(job, new Path(entrada_arquivo));
        FileOutputFormat.setOutputPath(job, new Path(saida_pasta));
        
        job.waitForCompletion(true);
    }
}
