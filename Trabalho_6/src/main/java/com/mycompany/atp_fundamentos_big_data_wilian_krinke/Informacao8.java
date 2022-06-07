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
import org.apache.hadoop.io.LongWritable;
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
public class Informacao8 {  
    
    public static class Implementacao8MapperAtp extends Mapper<Object, Text, Text, LongWritable>{
        
        @Override
        public void map(Object id, Text valor, Context context) throws IOException, InterruptedException{            
            try{
                String linha = valor.toString();
                String[] campos = linha.split(";");
                                                    
                if(campos.length == 10){
                    /*Mercadoria com maior total de peso , de acordo com todas as transações, por ano*/                    
                    
                    Text mercadoria = new Text(campos[3]);
                    LongWritable pesos = new LongWritable(Long.parseLong(campos[6]));
                    IntWritable ano = new IntWritable(Integer.parseInt(campos[1]));
                    
                    Text chaveConcatenada = new Text(mercadoria + " / " + ano + " / "); 
                    context.write(chaveConcatenada, pesos);
                }                
            
            }catch(Exception e){
                System.out.println(e);
            }
        }
    }
    
    public static class Implementacao8ReducerAtp extends Reducer<Text, LongWritable, Text, LongWritable>{
    
        @Override
        public void reduce(Text chave, Iterable<LongWritable> valores, Context context) throws IOException, InterruptedException{
            try{
                int soma = 0;
                LongWritable resultado = new LongWritable();

                for(LongWritable valor : valores){
                    soma += valor.get();                
                }

                resultado.set(soma);
                context.write(chave, resultado);
            }catch(Exception e){
                System.out.println(e);
            }
            
        }
    
    }
    
    public static void main(String[] args) throws IOException, InterruptedException, ClassNotFoundException{
       
        String entrada_arquivo = "/home2/ead2022/SEM1/wilian.krinke/Documents/base_100_mil.csv";
        String saida_pasta = "/home2/ead2022/SEM1/wilian.krinke/Documents/local/tarefa8";
        
        if(args.length == 2){
            entrada_arquivo = args[0];
            saida_pasta = args[1];
        }
        
        Configuration conf = new Configuration();
        Job job = Job.getInstance(conf, "Implementação8.txt");
        
        job.setJarByClass(Informacao8.class);
        job.setMapperClass(Implementacao8MapperAtp.class);
        job.setReducerClass(Implementacao8ReducerAtp.class);
        job.setOutputKeyClass(Text.class);
        job.setOutputValueClass(LongWritable.class);
        
        FileInputFormat.addInputPath(job, new Path(entrada_arquivo));
        FileOutputFormat.setOutputPath(job, new Path(saida_pasta));
        
        job.waitForCompletion(true);
    }
}
